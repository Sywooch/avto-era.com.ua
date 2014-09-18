<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Search Controller
 *
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2013 ImageCMS
 * @author <dev@imagecms.net>
 */
class Search extends \Search\BaseSearch {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display products list.
     *
     * @access public
     */
    public function index() {
        // Begin pagination
        $this->load->library('Pagination');
        $this->pagination = new SPagination();
        $config['base_url'] = shop_url('search/' . $this->_getQueryString());
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->data['totalProducts'];
        $config['per_page'] = $this->perPage;
        $config['last_link'] = ceil($this->data['totalProducts'] / $this->perPage);
        $config['first_link'] = 1;
        /* --------- */
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '→';
        $config['prev_link'] = '←';

        $this->pagination->num_links = 6;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        // End pagination

        $this->template->registerMeta("ROBOTS", "NOINDEX, NOFOLLOW");
        $this->render('search', $this->data);
        exit;
    }

    /**
     * Autocomplete for search
     * @return jsone
     */
    public function ac() {
        $NextCS = $this->template->get_var('NextCS');
        $NextCSId = $this->template->get_var('NextCSId');
        
        if (mb_strlen($this->input->post('queryString')) >= 3) {

            $res = $this->db
                            ->select('DISTINCT shop_product_variants.product_id as product_id, name, url, shop_products.smallModImage, shop_product_variants.mainImage, shop_product_variants.price as price, shop_product_variants.id')
                            ->join('shop_products_i18n', 'shop_products.id = shop_products_i18n.id')
                            ->join('shop_product_variants', 'shop_products.id = shop_product_variants.product_id')
                            ->like('name', trim($_POST['queryString']))
                            ->or_like('number', trim($_POST['queryString']))
                            ->where('active', 1)
                            ->where('locale', \MY_Controller::getCurrentLocale())
                            ->order_by('shop_product_variants.position')
                            ->group_by('shop_products.id')
                            ->limit(5)
                            ->distinct()
                            ->get('shop_products')->result_array();

            foreach ($res as $key => $val) {

                $product = \SProductsQuery::create()->findPk($val['product_id']);

                if ($product) {
                    $res[$key]['price'] = $product->firstVariant->toCurrency();
                    $res[$key]['mainImage'] = $product->firstVariant->getMainPhoto();
                    $res[$key]['smallImage'] = $product->firstVariant->getSmallPhoto();
                    if ($NextCS != null) {
                        $res[$key]['nextCurrency'] = $product->firstVariant->toCurrency('Price', $NextCSId);
                    }
                } else {
                    $res[$key]['price'] = 0;
                }
            }

            $res['queryString'] .= $this->input->post(queryString);

            return json_encode($res);
        } else {
            $this->core->error_404();
        }
    }

}

/* End of file search.php */