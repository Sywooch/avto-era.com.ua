<?php

namespace Search;

(defined ( 'BASEPATH' )) or exit ( 'No direct script access allowed' );

/**
 * Shop Controller
 *
 * @uses \ShopController
 * @package Shop
 * @copyright 2013 ImageCMS
 * @property products SProducts
 */
class BaseSearch extends \ShopController {
	protected $perPage = 10;
	protected $data = array ();
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'string' );
		
		// Load per page param
		$this->perPage = $this->input->get ( 'user_per_page' ) ?  : \ShopCore::app ()->SSettings->frontProductsPerPage;
		
		$this->load->module ( 'core' );
		$this->core->set_meta_tags ( \ShopCore::t ( 'Поиск' ) );
		
		$this->REQUEST_URI = $_SERVER ['REQUEST_URI'];
		
		if ($this->uri->segment ( 3 ) != 'ac') {
			$this->__CMSCore__ ();
			$this->index ();
		}
	}
	
	/**
	 * Display products list.
	 *
	 * @access public
	 */
	public function __CMSCore__() {
		$this->perPage = (intval ( $_GET ['user_per_page'] )) ? intval ( $_GET ['user_per_page'] ) : $this->perPage = \ShopCore::app ()->SSettings->frontProductsPerPage;
		
		$search_str = trim ( $_GET ['text'] );
		// Start search from one char.
		if (! is_string ( $search_str ))
			$search_str = ( string ) $search_str;
		
		/**
		 * Init event ShopBaseSearch:preSearch *
		 */
		\CMSFactory\Events::create ()->registerEvent ( array (
				'search_text' => $search_str 
		), 'ShopBaseSearch:preSearch' );
		\CMSFactory\Events::runFactory ();
		
		// if (mb_strlen($search_str) >= 3) {
		$products = \SProductsQuery::create ()->joinWithI18n ( \MY_Controller::getCurrentLocale () )->leftJoin ( 'ProductVariant' )->orderBy ( 'ProductVariant.Stock', 'DESC' )->distinct ()->filterByActive ( true );
		// -------
		$sub_categorys = \SProductsQuery::create ()->joinWithI18n ( \MY_Controller::getCurrentLocale () )->select ( 'CategoryId' )->filterByActive ( true );
		
		// -------
		
		$brandsInSearchResult = \SProductsQuery::create ()->joinWithI18n ( \MY_Controller::getCurrentLocale () )->leftJoin ( 'ProductVariant' )->distinct ()->filterByActive ( true )->useI18nQuery ( \MY_Controller::getCurrentLocale () )->filterByName ( '%' . $search_str . '%' )->endUse ()->select ( array (
				'BrandId' 
		) );
		
		if (! empty ( $search_str )) {
			$products = $products->useI18nQuery ( \MY_Controller::getCurrentLocale () )->filterByName ( '%' . $search_str . '%' )->endUse ();
			
			$products = $products->orWhere ( 'ProductVariant.Number LIKE ?', '%' . $search_str . '%' );
			
			// -----------
			$sub_categorys = $sub_categorys->useI18nQuery ( \MY_Controller::getCurrentLocale () )->filterByName ( '%' . $search_str . '%' )->endUse ();
			// -----------
			
			if (! empty ( $_GET ['category'] ) && $_GET ['category'] > 0) {
				$brandsInSearchResult = $brandsInSearchResult->filterByCategoryId ( ( int ) $_GET ['category'] );
				$products = $products->filterByCategoryId ( ( int ) $_GET ['category'] );
			}
			
			// // Filter by brand
			if (! empty ( $_GET ['brand'] ) && $_GET ['brand'] > 0)
				$products = $products->filterByBrandId ( ( int ) $_GET ['brand'] );
			
			$brandsInSearchResult = $brandsInSearchResult->find ()->toArray ();
			
			if (sizeof ( $brandsInSearchResult ) > 0) {
				$brandsInSearchResult = \SBrandsQuery::create ()->findPks ( $brandsInSearchResult );
			}
		}
		$sub_categorys = $sub_categorys->find ()->toArray ();
		
		$count_cats = array_count_values ( $sub_categorys );
		/**
		 * Prepare category tree of Main catagory and sub-categories
		 */
		$categories = array ();
		$count = 0;
		foreach ( $count_cats as $key => $value ) {
			
			$category = \SCategoryQuery::create ()->filterById ( $key )->joinWithI18n ( \MY_Controller::getCurrentLocale () )->
			// ->filterByActive(TRUE)
			findOne ();
			
			foreach ( $category->buildCategoryPath () as $cat ) {
				$parentCategory = $cat;
				break;
			}
			
			if ($parentCategory) {
				
				$categories [$parentCategory->getId ()] [$parentCategory->getName ()] [] = array (
						'id' => $category->getId (),
						'name' => $category->getName (),
						'count' => $count_cats [$category->getId ()] 
				);
				// $categories[$parentCategory->getId()][$parentCategory->getName()]['count'] += $count_cats[$category->getId()];
			}
		}
		/**
		 * Set userPerPage Products Count
		 */
		// choode order method (default or get)
		if (! $_GET ['order']) {
			$order_method = \Category\BaseCategory::getDefaultSort ();
			// $order_method = $order_method->get;
		} elseif (! empty ( $_GET ['order'] )) {
			$order_method = $_GET ['order'];
		}
		
		// for order method by get order
		if ($order_method) {
			$products = $products->globalSort ( $order_method );
		}
		
		$totalProducts = $this->_count ( $products );
		
		$products = $products->offset ( ( int ) $_GET ['per_page'] )->limit ( ( int ) $this->perPage )->find ();
		
		// Load product variants
		$products->populateRelation ( 'ProductVariant' );
		
		/**
		 * Setting core data
		 */
		$this->core->core_data ['data_type'] = 'search';
		
		$this->data = array (
				'products' => $products,
				'cart_data' => \ShopCore::app ()->SCart->getData (),
				'totalProducts' => $totalProducts,
				'brandsInSearchResult' => $brandsInSearchResult,
				
				// 'tree' => \ShopCore::app()->SCategoryTree->getTree(0),
				// 'tree' => \ShopProductCategoriesQuery::create()->find(),
				'categories' => $categories,
				'order_method' => $order_method 
		);
		// }
		
		\ShopCore::app ()->SCategoryTree->setLoadUnactive ( false );
		$this->data ['tree'] = \ShopCore::app ()->SCategoryTree->getTree ( 0 );
		if (mb_strlen ( $_POST ['queryString'] ) >= 1) {
			/**
			 *
			 * @deprecated since version number
			 */
			if ($_POST ['cat'] != 2) {
				$category = \SCategoryQuery::create ()->filterByFullPathIds ( '%' . $_POST ['cat'] . '%' )->select ( array (
						'Id' 
				) )->find ()->toArray ();
				array_push ( $category, $cat );
			}
			
			$products = \SProductsQuery::create ()->addSelectModifier ( 'SQL_CALC_FOUND_ROWS' )->leftJoin ( 'ProductVariant' )->joinWithI18n ( \MY_Controller::getCurrentLocale () )->distinct ()->filterByActive ( true )->useI18nQuery ( \MY_Controller::getCurrentLocale () )->filterByName ( '%' . $_POST ['queryString'] . '%' )->endUse ();
			
			$products = $products->orWhere ( 'ProductVariant.Number LIKE ?', $_POST ['queryString'] );
			
			if ($_POST ['cat'] != 2) {
				$products = $products->filterByCategoryId ( $category );
			}
			
			$totalProducts = $this->getTotalRow ();
			
			$products = $products->offset ( ( int ) $_GET ['per_page'] )->limit ( ( int ) $this->perPage )->find ();
			
			// Load product variants
			$products->populateRelation ( 'ProductVariant' );
			if (sizeof ( $products ) > 0) {
				$result = '<div class="search_drop">
                                 <ul>';
				foreach ( $products as $product ) {
					$prices = currency_convert ( $product->firstvariant->getPrice (), $product->firstvariant->getCurrency () );
					$result .= '
                                    <li class="smallest_item">
                                        <a class="photo_block" href="' . shop_url ( 'product/' . $product->getUrl () ) . '" class="photo">
                                            <img src="' . productImageUrl ( $product->getSmallModImage () ) . '"/>
                                        </a>
                                    <div class="func_description">
                                        <a class="title" href="' . shop_url ( 'product/' . $product->getUrl () ) . '">' . $product->getName () . '</a>
                                        <div class="buy">
                                        <div class="price f-s_14">
                                            <span>' . $prices ['main'] ['price'] . $prices ['main'] ['symbol'] . '</span>
                                        </div>
                                        </div>
                                    </div>
                                    </li>';
				}
				if ($totalProducts > 5)
					$result .= '</ul>  <a class="all_result" style="bottom:0;" href="/shop/search?text=' . $_POST ['queryString'] . '" >' . lang ( 'All result' ) . '</a>
                       </div>  </div></div>
                    ';
				echo $result;
			}
			exit ();
		}
	}
	
	/**
	 *
	 * @return type
	 */
	private function getTotalRow() {
		$connection = \Propel::getConnection ();
		$statement = $connection->prepare ( 'SELECT FOUND_ROWS() as `number`' );
		$statement->execute ();
		$resultset = $statement->fetchAll ();
		return $resultset [0] ['number'];
	}
	
	/**
	 * Convert price to main currency
	 * 
	 * @param type $sum        	
	 * @return
	 *
	 */
	protected function convertToMainCurrency($sum) {
		return ShopCore::app ()->SCurrencyHelper->convertToMain ( $sum, ShopCore::app ()->SCurrencyHelper->current->getId () );
	}
	
	/**
	 * Count total products in category
	 *
	 * @param SProductsQuery $object        	
	 * @return int
	 */
	protected function _count(\SProductsQuery $object) {
		$object = clone $object;
		return $object->count ();
	}
	protected function _getQueryString() {
		$data = array ();
		
		$need = array (
				'text',
				'f',
				'lp',
				'rp',
				'brand',
				'order',
				'category',
				'user_per_page' 
		);
		
		foreach ( $need as $key => $value ) {
			if (isset ( $_GET [$value] )) {
				$data [$value] = $_GET [$value];
			}
		}
		
		return '?' . http_build_query ( $data );
	}
}

/* End of file search.php */