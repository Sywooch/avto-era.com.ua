<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Shop Product Controller
 * @package Shop
 * @copyright 2013 ImageCMS
 * @author <dev@imagecms.net>
 * @property SProducts $model
 * @property Mod_discount $mod_discount
 */
class Product extends \Products\BaseProducts {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display product
     * @access public
     */
    public function index() {
        if ($this->model->getUrl() !== $this->productPath) {
            redirect('shop/product/' . $this->model->getUrl(), 'location', '301');
        }

        if (!empty($_GET) || strstr($this->input->server('REQUEST_URI'), '?')) {
            $this->template->registerCanonical(site_url($this->uri->uri_string()));
        }

        $this->data['delivery_methods'] = \SDeliveryMethodsQuery::create()->find();
        $this->data['payments_methods'] = \SPaymentMethodsQuery::create()->find();

        if ($this->model->getMetaTitle()) {
            $title = $this->model->getMetaTitle();
        } else {
            $title = $this->model->getName() . " купить в Интернет-магазине Beautiful-cars Киев, лучшие цены и отзывы в Украине";
        }


        if ($this->model->getMetaDescription()) {
            $des = $this->model->getMetaDescription();
        } else {
            $desc = $this->model->getId() . ' - ' . $this->model->getName() . " &#10132; купить с доставкой по Киеву, Украине цена " . $this->model->firstVariant->getPrice() . " грн., отзывы";

            if ($diam = SProductPropertiesDataQuery::create()->filterByProductId($this->model->getId())->filterByPropertyId(44)->select('SProductPropertiesData.Value')->findOne())
                $desc .= ", диаметр $diam.";
        }


        $title = $this->model->getId() . " - " . $title;

        $this->core->set_meta_tags($title, $this->model->getMetaKeywords(), $desc, '', 1);

        \CMSFactory\Events::create()->registerEvent($this->data, 'product:load');
        \CMSFactory\Events::runFactory();

        $this->render($this->templateFile, $this->data);
        exit;
    }

}

/** End of file application/modules/shop/product.php  */