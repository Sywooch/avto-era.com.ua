<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Shop Brands Controller
 *
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2013 ImageCMS
 * @author <dev@imagecms.net>
 * @property SBrands $model
 */
class Brand extends \Brands\BaseBrands {
	public function __construct() {
		parent::__construct ();
	}

	/**
	 * Display list of brand products.
	 */
	public function index() {
		if ($this->brandPath == 'brand') {
			$this->core->set_meta_tags ( 'Бренды' );
			$this->renderImageList ();
			// $this->renderNamesList();
		}

		if ($this->model == NULL)
			$this->core->error_404 ();

		if (! $this->category) {
			if ($this->model->getUrl () !== $this->brandPath)
				redirect ( 'shop/brand/' . $this->model->getUrl (), 'location', '301' );
		}
		// Begin pagination
		$this->load->library ( 'Pagination' );
		$this->pagination = new SPagination ();
		$config ['base_url'] = shop_url ( 'brand/' . $this->model->getUrl () . '/' . $this->category . SProductsQuery::getFilterQueryString () );
		$config ['page_query_string'] = true;
		$config ['total_rows'] = $this->data [totalProducts];
		$config ['per_page'] = $this->perPage;

		$choice = ceil ( $config ["total_rows"] / $config ["per_page"] );
		$config ['last_link'] = $choice;
		$config ['first_link'] = 1;
		$config ['next_link'] = '→';
		$config ['prev_link'] = '←';

		$this->pagination->initialize ( $config );
		$this->data [pagination] = $this->pagination->create_links ();
		$this->data [page_number] = $this->pagination->cur_page;
		// End pagination

		$brName = mb_convert_case ( $this->model->getName (), MB_CASE_TITLE, 'utf8' );

		if ((! empty ( $_GET ) || strstr ( $_SERVER ['REQUEST_URI'], '?' )) && (! $_GET ['per_page']))
			$this->template->registerCanonical ( site_url ( $this->uri->uri_string () ) );

		if ($this->model->getMetaTitle ()) {
			$title = $this->model->getMetaTitle ();
		} else {
			$title = "Шыни $brName купить в Киеве для легковых и грузовых автомобилей в магазине Beautiful-cars";
		}

		if ($this->model->getMetaDescription ()) {
			$description = $this->model->getMetaDescription ();
		} else {
			$description = "Шыни $brName покупайте по самых низких ценах с доставкой по Киеву и Украине для легковых автомобилей и грузовиков.";
		}

		$this->core->set_meta_tags ( $title, $this->model->getMetaKeywords (), $description, $this->pagination->cur_page, 1 );

		\CMSFactory\Events::create ()->registerEvent ( $this->data, 'brand:load' );
		\CMSFactory\Events::runFactory ();

		$this->render ( $this->data [template], $this->data );
	}
}

/* End of file brand.php */

