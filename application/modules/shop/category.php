<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * @property SCategory $categoryModel
 */
class Category extends \Category\BaseCategory {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->categoryModel->getFullPath() !== $this->categoryPath)
			redirect('shop/category/' . $this->categoryModel->getFullPath(), 'location', '301');

		/** Pagination */
		$this->load->library('Pagination');
		$this->pagination = new SPagination();
		$config['base_url'] = shop_url('category/' . $this->categoryModel->getFullPath() . SProductsQuery::getFilterQueryString());
		$config['page_query_string'] = true;
		$config['total_rows'] = $this->data['totalProducts'];
		$config['per_page'] = $this->perPage;
		$config['first_link'] = '1';
		$config['next_link'] = '→';
		$config['prev_link'] = '←';
		$config['last_link'] = ceil($this->data['totalProducts'] / $this->perPage);

		$this->pagination->num_links = 3;
		$this->pagination->initialize($config);
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['page_number'] = $this->pagination->cur_page;

		if ($_GET['per_page'] % $this->perPage != 0)
			redirect($this->uri->uri_string(), 'location');

		/* Seo block (canonical) */
		if ((!empty($_GET) || strstr($_SERVER['REQUEST_URI'], '?')) && (!$_GET['per_page']))
			$this->template->registerCanonical(site_url($this->uri->uri_string()));

		//Назва категрії або (підкатегорії) + купить в Киеве по низкой цене в Интернет магазине Beautiful-cars

		/* Set meta tags */
		if ($this->categoryModel->getMetaTitle())
			$title = $this->categoryModel->getMetaTitle();
		else
			$title = $this->categoryModel->getName () . " купить в Киеве по низкой цене в Интернет магазине Beautiful-cars Украина";

		if ($this->categoryModel->getMetaDesc())
			$desc = $this->categoryModel->getMetaDesc();
		else
			$desc = $this->categoryModel->getName () . " покупайте по самых низких ценах с доставкой по Киеву и Украине, лучшие отзывы и характеристики.";

		$this->core->set_meta_tags($title, $this->categoryModel->makePageKeywords(), $desc, $this->pagination->cur_page, 1);

		/** Register event 'category:load' */
		\CMSFactory\Events::create()->registerEvent($this->data, 'category:load');
		\CMSFactory\Events::runFactory();

		/** Render template */
		$this->render($this->templateFile, $this->data);
		exit;
	}

}

