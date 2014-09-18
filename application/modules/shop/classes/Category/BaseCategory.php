<?php

namespace Category;

(defined('BASEPATH')) OR exit('No direct script access allowed');

class BaseCategory extends \ShopController {

    public $data;
    public $locale;
    public $perPage;
    public $templateFile;
    public $categoryModel;
    public $categoryPath;

    public function __construct() {
        parent::__construct();

        /** Set Locale */
        $this->locale = \MY_Controller::getCurrentLocale();

        /** Remove locale/shop/category from request */
        $this->categoryPath = ($this->locale == $this->uri->segments[1]) ? implode('/', array_slice($this->uri->segments, 3)) : implode('/', array_slice($this->uri->segments, 2));

        /** Get SCategory Model */
        $this->categoryModel = \SCategoryQuery::create()
                ->joinWithI18n($this->locale)
                ->withColumn('IF(H1 IS NOT NULL AND H1 NOT LIKE "", H1, Name)', 'title')
                ->filterByFullPath($this->categoryPath)
                ->filterByActive(TRUE)
                ->findOne();

        /** SCategory OR exit with 404 */
        ($this->categoryModel !== null) OR $this->core->error_404();

        \ShopCore::$currentCategory = $this->categoryModel;

        $this->__CMSCore__();
        if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest')
            $this->index();
    }

    public function __CMSCore__() {
        if (!is_numeric($_GET['per_page']) && $_GET['per_page'] != NULL)
            $this->core->error_404();

        /** Set userPerPage Products Count */
        $this->perPage = (intval($_GET['user_per_page'])) ? intval($_GET['user_per_page']) : $this->perPage = \ShopCore::app()->SSettings->frontProductsPerPage;

        /** Set template file */
        $this->templateFile = ($this->categoryModel->getTpl() == '') ? 'category' : $this->categoryModel->getTpl();

        /** Setting core data */
        $this->core->core_data['data_type'] = 'shop_category';
        $this->core->core_data['id'] = $this->categoryModel->getId();

        /** Enable Query Caching */
        $this->db->cache_on();

        /** Prepare products model */
        $products = \SProductsQuery::create()
                ->addSelectModifier('SQL_CALC_FOUND_ROWS')
                ->filterByCategory($this->categoryModel)
                ->filterByActive(true)
                ->joinWithI18n($this->locale)
                ->joinProductVariant()
                ->withColumn('IF(sum(shop_product_variants.stock) > 0, 1, 0)', 'allstock')
                ->groupById()
                ->joinBrand()
                ->distinct()
                ->orderBy('allstock', \Criteria::DESC);
        $this->db->cache_off();

        /** Filter initializing */
        \ShopCore::app()->SFilter->init($this->categoryModel);

        /** Filter $_GET parameters */
        \ShopCore::app()->SFilter->filterGet();

        /** Filter product by price in $_GET['lp'] and $_GET['rp'] */
        $products = \ShopCore::app()->SFilter->makePriceFilter($products);

        /** Filter products by brands in $_GET['brand'] */
        $products = \ShopCore::app()->SFilter->makeBrandsFilter($products);

        /** Filter products by properties $_GET['p'] */
        $products = \ShopCore::app()->SFilter->makePropertiesFilter($products);

        /** Choode order method (default or get) */
        if (!$_GET['order']) {
            $order_method = $this->getDefaultSort();
        } elseif (!empty($_GET['order'])) {
            $order_method = $_GET['order'];
        }

        /** For order method by get order */
        if ($order_method) {
            $products = $products->globalSort($order_method);
        }

        /** Geting products model from base */
        $products = $products->offset((int) $_GET['per_page'])
                ->limit((int) $this->perPage)
                ->find();

        /** Get total product count according to filter parameters */
        $totalProducts = $this->getTotalRow();

        /** Prepare arrays for filter.tpl */
        $brands = \ShopCore::app()->SFilter->getBrands();
        $properties = \ShopCore::app()->SFilter->getProperties();
        $priceRange = \ShopCore::app()->SFilter->getPricerange();

        /** Render category page */
        $this->data = array(
        'title' => $this->categoryModel->virtualColumns['title'],
        'category' => $this->categoryModel,
        'priceRange' => $priceRange,
        'products' => $products,
        'model' => & $products,
        'totalProducts' => $totalProducts,
        'propertiesInCat' => $properties,
        'brands' => $brands,
        'order_method' => $order_method
        );
    }

    /**
     * Get total rows
     * @return int
     */
    private function getTotalRow() {
        $connection = \Propel::getConnection();
        $statement = $connection->prepare('SELECT FOUND_ROWS() as `number`');
        $statement->execute();
        $resultset = $statement->fetchAll();
        return $resultset[0]['number'];
    }

    /**
     * Get default sort method
     * @return type
     */
    public function getDefaultSort() {
        if ($this->categoryModel) {
            $order_method = $this->categoryModel->getOrderMethod();
            $order_from_db = $this->db->where('id', (int) $order_method)->get('shop_sorting')->result_array();
            $order = $order_from_db[0]['get'];
        }
        
        if (!empty($order))
            return $order;
        else {
            $order = $this->db
                    ->select('shop_sorting.get')
                    ->from('shop_sorting')
                    ->where('shop_sorting.active', 1)
                    ->order_by('shop_sorting.pos')
                    ->get()
                    ->row();
            return $order->get;
        }
    }

}

