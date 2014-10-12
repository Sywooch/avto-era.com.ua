<?php

namespace Products;

(defined ( 'BASEPATH' )) or exit ( 'No direct script access allowed' );

/**
 * Shop Controller
 *
 * @uses \ShopController
 * @package Shop
 * @copyright 2013 ImageCMS
 * @property \SProducts $model
 */
class BaseProducts extends \ShopController {
	public $data = null;
	public $model = null;
	public $productPath;
	public $templateFile = 'product';
	public function __construct() {
		parent::__construct ();

		$this->productPath = $this->uri->segment ( $this->uri->total_segments () );

		$this->model = \SProductsQuery::create ()->joinWithI18n ( \MY_Controller::getCurrentLocale () )->joinMainCategory ()->filterByUrl ( $this->productPath )->filterByActive ( true )->findOne ();

		(count ( $this->model )) or $this->core->error_404 ();

		\ShopCore::$currentCategory = $this->model->getMainCategory ();

		$this->__CMSCore__ ();
		$this->index ();
		exit ();
	}

	/**
	 * Display product info.
	 *
	 * @access public
	 */
	public function __CMSCore__() {
		/**
		 * Start.
		 * Set public Core Data
		 */
		$this->core->core_data ['data_type'] = 'product';
		$this->core->core_data ['id'] = $this->model->getId ();
		/**
		 * End.
		 * Set public Core Data
		 */
		/**
		 * Start.
		 * Prepare public Data
		 */
		$this->data ['model'] = $this->model;
		$this->data ['variants'] = $this->model->getProductVariants ();
		$this->data ['accessories'] = $this->model->getRelatedProductsModels ();

		if ($this->model->getTpl ())
			$this->templateFile = $this->model->getTpl ();

		$category = \SCategoryQuery::create ()->findById ( $this->model->getCategoryId () );
		$this->data ['category_url'] = shop_url ( 'category/' . $category [0]->getFullPath () );
		/**
		 * End.
		 * Prepare public Data
		 */
		/**
		 * Start.
		 * Increase views value for Product
		 */
		$this->db->query ( 'UPDATE `' . \SProductsPeer::TABLE_NAME . '` SET views = views + 1 WHERE id = ' . $this->model->getId () );
		/**
		 * End.
		 * Increase views value for Product
		 */
	}
}

/* End of file product.php _Admin_ ImageCms */