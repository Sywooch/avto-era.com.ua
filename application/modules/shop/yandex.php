<?php

/**
 * Export to Yandex.Market
 */
class Yandex extends ShopController {

    protected $offers = array();
    protected $categories = array();
    protected $currencyCode;

    public function __construct() {
        $this->currencyCode = SCurrenciesQuery::create()->filterByIsDefault(true)->findOne()->getCode();
        parent::__construct();
    }

    public function allCatId($arg) {
        $query = $this->db->get_where('shop_product_categories', array('product_id' => $arg));
        $row = $query->row();

        foreach ($query->result() as $row) {
            $a = $row->category_id;
        }

        return $a;
    }

    public function genreYML() {
        $ci = ShopCore::$ci;
        $pictureBaseUrl = base_url() . "uploads/shop/products/main/";

        foreach ($this->getProducts() as $p) {
            foreach ($p->getProductVariants() as $v) {
                $unique_id += $p->getId() . '.' . $v->getId();
                $param = ShopCore::app()->SPropertiesRenderer->renderPropertiesMainArray($p);
                $this->offers[$unique_id] = array(
                    'url' => ShopCore::$ci->config->item('base_url') . '/shop/product/' . $p->url,
                    'price' => $v->getPrice(),
                    'currencyId' => $this->currencyCode,
                    'vendor' => $p->getBrand() ? $p->getBrand()->getName() : '',
                    'categoryId' => $p->getCategoryId(),
                    //'picture' => $p->firstvariant->getlargephoto(),
                    'picture' => $pictureBaseUrl . $v->getMainImage(),
                    'name' => encode($p->getName() . ' ' . $v->getName()),
                    'description' => '',
                    'param' => $param,
                    'variant' => $p->getProductVariants()
                );
                if (count($p->getSProductImagess()) > 0)
                    foreach ($p->getSProductImagess() as $key => $image)
                        $this->offers[$unique_id]['picture'.$key] = productImageUrl('products/additional/'.$image->getImageName());
            }
        }

        echo '<?xml version="1.0" encoding="utf-8"?>
			<!DOCTYPE yml_catalog SYSTEM "shops.dtd">
			<yml_catalog date="' . date('Y-m-d H:i') . '">
			<shop>
			<name>' . $ci->config->item('base_url') . '</name>
			<company>' . $ci->config->item('base_url') . '</company>
			<url>' . $ci->config->item('base_url') . '</url>';

        echo "\n\n";

        echo '<currencies>
			<currency id="' . $this->currencyCode . '" rate="1"/>
		</currencies>' . "\n\n";
        echo $this->renderCategories();
        echo $this->renderOffers();
        echo "</shop>\n";
        echo "</yml_catalog>";
    }

    public function renderCategories() {
        $categories = SCategoryQuery::create()->filterById(ShopCore::app()->SSettings->getSelectedCats())
                ->find();

        echo "<categories>";
        foreach ($categories as $c) {
            $parent = '';
            if ($c->getParentId() > 0) {
                $parent = ' parentId="' . $c->getParentId() . '"';
            }
            echo '<category id="' . $c->id . '"' . $parent . '>' . encode($c->name) . '</category>' . "\n";
        }
        echo "</categories>";
    }

    protected function renderOffers() {
        echo '<offers>';
        foreach ($this->offers as $id => $offer) {
            echo "\n<offer id=\"$id\" available=\"true\">\n";
            echo "" . $this->arrayToXml($offer);
            echo "</offer>\n\n";
        }
        echo '</offers>';
    }

    protected function arrayToXml($array) {
        foreach ($array as $k => $v) {
            if ($k == 'param') {
                foreach ($v as $prop)
                    echo "\t" . '<param name="' . str_replace(':', '', $prop['Name']) . '">' . $prop['Value'] . "</param>\n";
            } elseif ($k == 'variant') {
                foreach ($v as $var)
                    echo "\t" . '<param name="Размер">' . $var->getName() . "</param>\n";
            } elseif (strstr($k, 'picture')){
                echo "\t<picture>" . $v . "</picture>\n";
            }
            else
                echo "\t<$k>" . $v . "</$k>\n";
        }
    }

    public function getProducts() {
        $productsIds = ShopProductCategoriesQuery::create()
                ->select('ProductId')
                ->distinct()
                ->filterByCategoryId(ShopCore::app()->SSettings->getSelectedCats())
                ->find()
                ->toArray();
        $products = SProductsQuery::create()
                ->distinct()
                ->filterById($productsIds)
                ->leftJoin('ProductVariant')
                ->useProductVariantQuery()
                ->filterByStock(array('min' => 1))
                ->endUse()
                ->filterByActive(true)
                ->find();

        $products->populateRelation('ProductVariant');
        return $products;
    }

    protected static function prep_desc($var, $chars = 0, $end = '...') {
        if ($chars > 0 AND mb_strlen($var, 'utf-8') >= $chars) {
            $result = mb_substr($var, 0, $chars, 'utf-8') . $end;
        } else {
            $result = $var;
        }

        $result = str_replace('&ndash;', '', $result);
        $result = str_replace('&nbsp;', '', $result);
        $result = str_replace('&quot;', '', $result);
        $result = str_replace('&mdash;', '', $result);
        $result = str_replace('&laquo;', '', $result);
        $result = str_replace('&raquo;', '', $result);
        $result = str_replace('&ldquo;', '', $result);
        $result = str_replace('&rdquo;', '', $result);
        return $result;
    }

}