<?php

/**
 * ShopAdminCategories
 *
 * @uses ShopController
 * @package
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminCategories extends ShopAdminController {
	public $defaultLanguage = null;
	public $catProductsCounts = array ();
	public $tree = false;
	private $templatePath;
	private $all_cat = array ();
	private $ext_cat = array ();
	private $prod_count = array ();
	public function __construct() {
		parent::__construct ();
		$this->defaultLanguage = getDefaultLanguage ();
		$this->templatePath = ShopCore::app ()->SSettings->__get ( "systemTemplatePath" );
		$this->templatePath = str_replace ( "./", "", $this->templatePath ) . "/";
		$this->load_all_cat ();
		$this->load_count_prod ();
		$this->ext_cat ();
		// $this->output->enable_profiler(true);
	}
	public function index($id = null) {
		ShopCore::app ()->SCategoryTree->setLoadUnactive ( true );
		$this->tree = ShopCore::app ()->SCategoryTree->getTree ();
		$this->render ( 'list', array (
				'tree' => $this->tree,
				'htmlTree' => $this->printCategoryTree (),
				'languages' => ShopCore::$ci->cms_admin->get_langs ( true ) 
		) );
	}
	public function load_all_cat() {
		$sql = "select * from shop_category";
		$this->all_cat = $this->db->query ( $sql )->result_array ();
	}
	public function load_count_prod() {
		$sql = 'SELECT count(category_id) as prod_count, category_id FROM `shop_products` group by category_id';
		$res = $this->db->query ( $sql )->result_array ();
		if (count ( $res ) > 0)
			foreach ( $res as $r )
				$this->prod_count [$r ['category_id']] = $r ['prod_count'];
	}
	
	/*
	 * public function prod_count_child($key) {
	 *
	 * if (count($this->all_cat) > 0)
	 * foreach ($this->all_cat as $cat) {
	 * $data_arr = unserialize($cat['full_path_ids']);
	 * if (count($data_arr) > 0)
	 * foreach ($data_arr as $data)
	 * if ($data == $key)
	 * $arr_child[] = $cat['id'];
	 * }
	 *
	 * if (count($arr_child) > 0)
	 * foreach ($arr_child as $r)
	 * $sum += $this->prod_count[$r];
	 *
	 * return (int) $sum;
	 * }
	 *
	 */
	public function ext_cat() {
		if (count ( $this->all_cat ) > 0) {
			foreach ( $this->all_cat as $cat )
				$this->ext_cat [$cat ['id']] = $cat;
			
			foreach ( $this->ext_cat as $key => $cat ) {
				foreach ( $this->ext_cat as $cat_parent )
					if ($cat ['id'] == $cat_parent ['parent_id']) {
						$this->ext_cat [$key] ['has_child'] = true;
						break;
					}
				$this->ext_cat [$key] ['prod_count'] = $this->prod_count [$key];
				// $this->ext_cat[$key]['prod_count_ch'] = $this->prod_count_child($key);
			}
		}
	}
	
	/**
	 * Create new category.
	 *
	 * @access public
	 */
	public function create() {
		$model = new SCategory ();
		
		\CMSFactory\Events::create ()->registerEvent ( '', 'ShopAdminCategories:preCreate' );
		\CMSFactory\Events::runFactory ();
		
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run () == FALSE) {
				showMessage ( validation_errors () );
			} else {
				// Check if category URL is aviable.
				$urlCheck = SCategoryQuery::create ()->where ( 'SCategory.Url = ?', ( string ) $_POST ['Url'] )->where ( 'SCategory.ParentId = ?', ( int ) $_POST ['ParentId'] )->findOne ();
				
				if ($urlCheck !== null) {
					exit ( showMessage ( lang ( 'Specified URL busy', 'admin' ) ) );
				}
				
				$_POST ['Active'] = ( int ) $_POST ['Active'];
				
				$model->fromArray ( $_POST );
				$model->setTpl ( $_POST ['tpl'] );
				$model->setOrderMethod ( $_POST ['order_method'] );
				$model->setShowsitetitle ( $_POST ['showsitetitle'] );
				$model->save ();
				
				// Build categories tree to get category full uri path.
				$tree = ShopCore::app ()->SCategoryTree->getTree ();
				$category = $tree [$model->getId ()];
				
				// Delete self id from ids path.
				$ids = $category->getFullPathIdsVirtual ();
				array_pop ( $ids );
				
				$model->setFullPath ( implode ( '/', $category->getFullUriPath () ) );
				$model->setFullPathIds ( serialize ( $ids ) );
				$model->save ();
				
				$CI = &get_instance ();
				
				if ($CI->db->get_where ( 'components', array (
						'name' => 'sitemap' 
				) )->row ())
					$CI->load->module ( 'sitemap' )->ping_google ( $this );
				
				\CMSFactory\Events::create ()->registerEvent ( array (
						'ShopCategoryId' => $model->getId () 
				) )->runFactory ();
				
				showMessage ( lang ( 'Category created', 'admin' ) );
				if ($_POST ['action'] == 'close')
					pjax ( '/admin/components/run/shop/categories/index' );
				
				if ($_POST ['action'] == 'edit')
					pjax ( '/admin/components/run/shop/categories/edit/' . $model->getId () . '/' . $locale );
				$this->cache->clearCacheFolder ( 'category' );
			}
		} else {
			$this->render ( 'create', array (
					'model' => $model,
					'categories' => ShopCore::app ()->SCategoryTree->getTree (), // Categories array for parent_id dropdown.
					'tpls' => $this->get_tpl_names ( $this->templatePath ) 
			) );
		}
	}
	
	/**
	 * Edit category
	 *
	 * @access public
	 */
	public function edit($id = null, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		$currentLocale = MY_Controller::getCurrentLocale ();
		$model = SCategoryQuery::create ()->joinWithI18n ( $currentLocale )->findPk ( ( int ) $id );
		
		\CMSFactory\Events::create ()->registerEvent ( array (
				'model' => $model,
				'userId' => $this->dx_auth->get_user_id () 
		), 'ShopAdminCategories:preEdit' );
		\CMSFactory\Events::runFactory ();
		
		if ($model === null)
			$this->error404 ( lang ( 'Category not found', 'admin' ) );
		/**
		 * Update category data
		 */
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run () == FALSE) {
				showMessage ( validation_errors () );
			} else {
				// Check if category URL is aviable.
				$urlCheck = SCategoryQuery::create ()->where ( 'SCategory.Url = ?', ( string ) $_POST ['Url'] )->where ( 'SCategory.ParentId = ?', ( int ) $_POST ['ParentId'] )->where ( 'SCategory.Id != ?', ( int ) $model->getId () )->findOne ();
				
				if ($urlCheck !== null) {
					exit ( showMessage ( lang ( 'Specified URL is busy', 'admin' ) ) );
				}
				
				$_POST ['Active'] = ( int ) $_POST ['Active'];
				$_POST ['Locale'] = $locale;
				
				$model->fromArray ( $_POST );
				$model->SetTpl ( $_POST ['tpl'] );
				$model->setOrderMethod ( $_POST ['order_method'] );
				$model->setShowsitetitle ( $_POST ['showsitetitle'] );
				$model->save ();
				
				// Build categories tree to get category full uri path.
				$tree = ShopCore::app ()->SCategoryTree->getTree ();
				$category = $tree [$model->getId ()];
				
				// Delete self id from ids path.
				$ids = $category->getFullPathIdsVirtual ();
				array_pop ( $ids );
				
				$model->setFullPath ( implode ( '/', $category->getFullUriPath () ) );
				$model->setFullPathIds ( serialize ( ( array ) $ids ) );
				$model->save ();
				
				// Get all childs
				$childs = $model->getChildsByParentId ( $model->getId () );
				
				$this->updateUrls ( $childs );
				
				/**
				 * Init Event.
				 * Edit ShopCategory
				 */
				\CMSFactory\Events::create ()->registerEvent ( array (
						'ShopCategoryId' => $model->getId () 
				) )->runFactory ();
				/**
				 * End init Event.
				 * Edit ShopCategory
				 */
				showMessage ( lang ( 'Changes saved', 'admin' ) );
				
				$CI = &get_instance ();
				
				if ($CI->db->get_where ( 'components', array (
						'name' => 'sitemap' 
				) )->row ())
					$CI->load->module ( 'sitemap' )->ping_google ( $this );
				
				if ($_POST ['action'] == 'close')
					pjax ( '/admin/components/run/shop/categories/index' );
				
				if ($_POST ['action'] == 'edit')
					pjax ( '/admin/components/run/shop/categories/edit/' . $model->getId () . '/' . $locale );
				$this->cache->clearCacheFolder ( 'category' );
			}
		} else {
			$model->setLocale ( $locale );
			$this->load->helper ( 'cookie' );
			set_cookie ( 'category_full_path_ids', json_encode ( unserialize ( $model->getFullPathIds () ) ), 60 * 60 * 60 );
			
			$this->render ( 'edit', array (
					'model' => $model,
					'modelArray' => $model->toArray (),
					'categories' => ShopCore::app ()->SCategoryTree->getTree (),
					'languages' => ShopCore::$ci->cms_admin->get_langs ( true ),
					'locale' => $locale,
					'tpls' => $this->get_tpl_names ( $this->templatePath ) 
			) );
			exit ();
		}
	}
	protected function updateUrls($models) {
		foreach ( $models as $c ) {
			$ids = $c->getFullPathIdsVirtual ();
			array_pop ( $ids );
			
			$c->setFullPath ( implode ( '/', $c->getFullUriPath () ) );
			$c->setFullPathIds ( serialize ( ( array ) $ids ) );
			$c->save ();
			
			$childs = $c->getChildsByParentId ( $c->getId () );
			if ($childs->count () > 0)
				$this->updateUrls ( $childs );
		}
	}
	
	/**
	 * Delete category
	 *
	 * @access public
	 * @return void
	 */
	public function delete() {
		// Get category id
		$category_id = $this->input->post ( 'id' );
		
		\CMSFactory\Events::create ()->registerEvent ( array (
				'ShopCategoryId' => $this->input->post ( 'id' ) 
		) )->runFactory ();
		
		// Delete category
		if (! is_array ( $category_id )) {
			$model = SCategoryQuery::create ()->findByID ( ( int ) $category_id );
			showMessage ( lang ( 'Category deleted successfully', 'admin' ) );
		} else if ($models = SCategoryQuery::create ()->findBy ( 'Id', $category_id )) {
			foreach ( $models as $c )
				$c->delete ();
			\MediaManager\Image::create ()->deleteImagebyCategoryId ( $this->input->post ( 'id' ) );
			showMessage ( lang ( 'Categories deleted successfully', 'admin' ) );
			$this->cache->clearCacheFolder ( 'category' );
		} else
			showMessage ( lang ( 'Failed to delete the category', 'admin' ) );
		
		$CI = &get_instance ();
		
		if ($CI->db->get_where ( 'components', array (
				'name' => 'sitemap' 
		) )->row ())
			$CI->load->module ( 'sitemap' )->ping_google ( $this );
	}
	private function printCategoryTree($ajax_tree = false) {
		if (! $ajax_tree)
			$tree = ShopCore::app ()->SCategoryTree->getTree ();
		else
			$tree = $ajax_tree;
		
		$output = '';
		if (! $ajax_tree)
			$output .= '<div class="sortable save_positions" data-url="/admin/components/run/shop/categories/save_positions">';
		else
			$output .= '<div class="frame_level sortable" style="display: block" data-url="/admin/components/run/shop/categories/save_positions">';
		if (! $ajax_tree) {
			foreach ( $tree as $c )
				if ($c->getParentId () == 0)
					$output .= $this->printCategory ( $c );
		} else {
			foreach ( $tree as $c )
				$output .= $this->printCategory ( $c );
		}
		
		$output .= '</div>';
		if (! $ajax_tree)
			return $output;
		else
			echo $output;
	}
	private function printCategory($category) {
		$catToDisplay = new stdClass ();
		
		if (is_object ( $category )) {
			$catToDisplay->id = $category->getId ();
			$catToDisplay->name = $category->getName ();
			$catToDisplay->url = $category->getFullPath ();
			$catToDisplay->active = $category->getActive ();
			$level = count ( explode ( '/', $catToDisplay->url ) );
			$catToDisplay->level = $level;
			$catToDisplay->column = $category->getColumn ();
		} else {
			$catToDisplay->id = $category ['id'];
			$catToDisplay->name = $category ['name'];
			$catToDisplay->url = $category ['link'];
			$catToDisplay->active = $category ['active'];
			$level = count ( explode ( '/', $category ['link'] ) );
			$catToDisplay->level = $level;
			$catToDisplay->column = $category ['column'];
		}
		
		$catToDisplay->hasChilds = ( bool ) $this->ext_cat [$catToDisplay->id] ['has_child'];
		// $catToDisplay->prodCnt = (int) $this->ext_cat[$catToDisplay->id]['prod_count_ch'];
		$catToDisplay->myProdCnt = ( int ) $this->ext_cat [$catToDisplay->id] ['prod_count'];
		
		$output .= '<div>';
		
		$this->template->assign ( 'cat', $catToDisplay );
		$output .= $this->template->fetch ( 'file:' . $this->getViewFullPath ( '_listItem' ) );
		
		$output .= '</div>';
		
		unset ( $catToDisplay );
		
		return $output;
	}
	public function ajax_load_parent() {
		$id = ( int ) $_POST ['id'];
		
		$subCats = SCategoryQuery::create ()->filterByParentId ( $id )->orderByPosition ()->find ();
		
		$this->printCategoryTree ( $subCats );
	}
	
	/**
	 * Save categories position.
	 *
	 * @access public
	 * @return void
	 */
	public function save_positions() {
		$positions = $_POST ['positions'];
		
		if (sizeof ( $positions ) == 0)
			return false;
		
		foreach ( $positions as $key => $val ) {
			$data [] = array (
					'id' => ( int ) $val,
					'position' => $key 
			);
		}
		$this->db->update_batch ( 'shop_category', $data, 'id' );
		
		showMessage ( lang ( 'Positions saved', 'admin' ) );
		$this->cache->clearCacheFolder ( 'category' );
	}
	
	/**
	 * Transilt title to url
	 */
	function ajax_translit() {
		$this->load->helper ( 'translit' );
		$str = $this->input->post ( 'str' );
		echo translit_url ( $str );
	}
	public function translate($id) {
		$model = SCategoryQuery::create ()->findPk ( ( int ) $id );
		
		if ($model === null)
			$this->error404 ( lang ( 'Category was not found', 'admin' ) );
		
		$languages = ShopCore::$ci->cms_admin->get_langs ( true );
		
		$translatableFieldNames = $model->getTranslatableFieldNames ();
		
		/**
		 * Update category translation
		 */
		if (! empty ( $_POST )) {
			// form validating
			$translatingRules = $model->translatingRules ();
			foreach ( $languages as $language ) {
				foreach ( $translatableFieldNames as $fieldName ) {
					$this->form_validation->set_rules ( $fieldName . '_' . $language ['identif'], $model->getLabel ( $fieldName ) . lang ( ' language ', 'admin' ) . $language ['lang_name'], $translatingRules [$fieldName] );
				}
			}
			
			if ($this->form_validation->run () == FALSE) {
				showMessage ( validation_errors () );
			} else {
				foreach ( $languages as $language ) {
					$model->setLocale ( $language ['identif'] );
					foreach ( $translatableFieldNames as $fieldName ) {
						$methodName = 'set' . $fieldName;
						$model->$methodName ( $this->input->post ( $fieldName . '_' . $language ['identif'] ) );
					}
				}
				
				$model->save ();
				
				showMessage ( lang ( 'Changes saved', 'admin' ) );
				$this->cache->clearCacheFolder ( 'category' );
			}
		} else {
			
			$mceEditorFieldNames = array (
					'Description' 
			);
			$requairedFieldNames = array (
					'Name' 
			);
			
			$this->render ( 'translate', array (
					'model' => $model,
					'languages' => $languages,
					'translatableFieldNames' => $translatableFieldNames,
					'mceEditorFieldNames' => $mceEditorFieldNames,
					'requairedFieldNames' => $requairedFieldNames 
			) );
		}
	}
	public function changeActive() {
		$id = $this->input->post ( 'id' );
		$model = SCategoryQuery::create ()->findPk ( $id );
		if (count ( $model ) > 0) {
			$model->setActive ( ! $model->getActive () );
			if ($model->save ())
				showMessage ( lang ( 'Changes saved', 'admin' ) );
			$this->cache->clearCacheFolder ( 'category' );
		}
	}
	public function create_tpl() {
		$file = $this->input->post ( 'filename' );
		$file = $this->templatePath . $file . '.tpl';
		if (! file_exists ( $file )) {
			$fp = fopen ( $file, "w" );
			if ($fp) {
				$responce = showMessage ( lang ( 'The file has been successfully created', 'admin' ), '', '', true );
				$result = true;
			} else {
				$responce = showMessage ( lang ( 'Could not create file', 'admin' ), '', '', true );
				$result = false;
			}
			fwrite ( $fp, "/* new ImageCMS Tpl file */" );
			fclose ( $fp );
			echo json_encode ( array (
					'responce' => $responce,
					'result' => $result 
			) );
		}
	}
	public function get_tpl_names($directory) {
		$arr = scandir ( $directory );
		foreach ( $arr as $item ) {
			if (is_file ( $directory . '/' . $item )) {
				$a = explode ( '.', $item );
				if ($a [1] == 'tpl')
					$result [] = str_replace ( '.tpl', '', $item );
			}
		}
		return $result;
	}
	
	/**
	 */
	public function ajaxUpdateCategoryColumn() {
		// Get data from post
		$categoryId = $this->input->post ( 'categoryId' );
		$column = $this->input->post ( 'column' );
		
		$model = SCategoryQuery::create ()->findPk ( $categoryId );
		
		// Clear cache
		$this->cache->clearCacheFolder ( 'category' );
		
		// If column updated success than return true else return false
		if ($model->setColumn ( $column )->save ())
			echo true;
		else
			echo false;
	}
}
