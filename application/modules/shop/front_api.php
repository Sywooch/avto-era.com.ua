<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Front_api extends ShopController {

    public function __construct() {
        parent::__construct();
    }

    public function getCatSelectOptions($cid, $sel) {
        $out = '<select class="color" id="' . $sel . '" name="' . $sel . '" onchange="getPropSelect(this, \'diameter\', 1)">';
        $out .= '<option value="0" selected="selected">выбрать</option>' . "\n";
        if ($cid && $cid != 0 && $cur_cat = SCategoryQuery::create()->findPk($cid)) {
            $cats = SCategoryQuery::create()->filterByParentId($cid)->filterByActive(1)->find();
            foreach ($cats as $c) {
                $out .= '<option data-url="'. $c->getUrl() . '*'. $c->getUrl() .'" value="' . $c->getId() . '">' . $c->getName() . '</option>' . "\n";
            }
            $inp = "<input type='hidden' name='url_appointment' value='" . $cur_cat->getUrl() . "'>";
        }
        return $out . '</select>' . $inp;
    }

    
     public function getTypeTr() {
        $bid = (int) $_POST['bid'];
        $out = '<select class="color" id="typetr" name="typetr">';
        $out .= '<option value="0" selected="selected">выберите тип</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->select(array('CategoryId'))->distinct()->find()->toArray();
        $cids = SCategoryQuery::create()->filterById($pids)->select(array('ParentId'))->distinct()->find()->toArray();
        $cat =  SCategoryQuery::create()->filterById($cids)->distinct()->find();

        if (count($cat) > 0) {
            foreach ($cat as $v) {
                $out .= '<option  value="' . $v->getId() . '*'. $v->getUrl() .'">' . $v->getName() . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

         public function getSezon() {
        $bid = (int) $_POST['bid'];
        $cid = (int) $_POST['cid'];

        $out = '<select class="color" id="sezon" name="sezon">';
        $out .= '<option value="0" selected="selected">выберите сезон</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->select(array('CategoryId'))->distinct()->find()->toArray();
        $cids = SCategoryQuery::create()->filterById($pids)->distinct()->find();


        if (count($cids) > 0) {
            foreach ($cids as $v) {
                
              if($v->getParentId() == $cid)  $out .= '<option value="' . $v->getId() . '*'. $v->getUrl() .'">' . $v->getName() . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

     public function getShirina() {
        $bid = (int) $_POST['bid'];
        $cid = (int) $_POST['cid'];

        $out = '<select class="color" id="shirina" name="p[42][]">';
        $out .= '<option value="0" selected="selected">выберите ширину</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->filterByCategoryId($cid)->select(array('Id'))->distinct()->find()->toArray();
        $shirina = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(42)->distinct()->select(array('Value'))->find()->toArray();



        if (count($shirina) > 0) {
            foreach ($shirina as $v) {
                
             $out .= '<option value="' . $v . '">' . $v . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

       public function getVysota() {
        $bid = (int) $_POST['bid'];
        $cid = (int) $_POST['cid'];
        $shirina = $_POST['shirina'];

        $out = '<select class="color" id="vysota" name="p[43][]">';
        $out .= '<option value="0" selected="selected">выберите ширину</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->filterByCategoryId($cid)->select(array('Id'))->distinct()->find()->toArray();
        $shirina = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(42)->filterByValue($shirina)->distinct()->select(array('ProductId'))->find()->toArray();

       $vysota = SProductPropertiesDataQuery::create()->filterByProductId($shirina)->filterByPropertyId(43)->distinct()->select(array('Value'))->find()->toArray();

        if (count($vysota) > 0) {
            foreach ($vysota as $v) {
                
             $out .= '<option value="' . $v . '">' . $v . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

    public function getDiametrShyn() {
        $bid = (int) $_POST['bid'];
        $cid = (int) $_POST['cid'];
        $shirina = $_POST['shirina'];
        $vysota = $_POST['vysota'];

        $out = '<select class="color" id="shnydimatr" name="p[44][]">';
        $out .= '<option value="0" selected="selected">выберите ширину</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->filterByCategoryId($cid)->select(array('Id'))->distinct()->find()->toArray();
        $shirina = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(42)->filterByValue($shirina)->distinct()->select(array('ProductId'))->find()->toArray();
        $vysota = SProductPropertiesDataQuery::create()->filterByProductId($shirina)->filterByPropertyId(43)->filterByValue($vysota)->distinct()->select(array('ProductId'))->find()->toArray();
        
        $diametr = SProductPropertiesDataQuery::create()->filterByProductId($vysota)->filterByPropertyId(44)->distinct()->select(array('Value'))->find()->toArray();

        if (count($diametr) > 0) {
            foreach ($diametr as $v) {
                
             $out .= '<option value="' . $v . '">' . $v . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }


        public function getFiltrShyn() {
        $ci = get_instance();

        $bid = (int) $_POST['bid'];
        $cid = (int) $_POST['cid'];
        $shirina = $_POST['shirina'];
        $vysota = $_POST['vysota'];
        $diametr = $_POST['diametr'];

        $where = ' WHERE shop_products.active = 1 ';

        if(!empty($bid))  $where .= " AND shop_products.brand_id =   '$bid' ";
        if(!empty($cid))  $where .= " AND (shop_products.category_id =  '$cid' OR shop_products.category_id IN (SELECT id FROM shop_category WHERE parent_id = '$cid')) ";
        if(!empty($shirina))  $where .= " AND shop_products.id IN (SELECT product_id FROM shop_product_properties_data WHERE property_id = 42 AND value = '$shirina') ";
        if(!empty($vysota))  $where .= " AND shop_products.id IN (SELECT product_id FROM shop_product_properties_data WHERE property_id = 43 AND value = '$vysota') ";
        if(!empty($diametr))  $where .= " AND shop_products.id IN (SELECT product_id FROM shop_product_properties_data WHERE property_id = 44 AND value = '$diametr') ";

        $ids = $ci->db->query('SELECT id FROM shop_products '. $where )->result_array();
        var_dump($ids,'SELECT id FROM shop_products '. $where );exit;

        // $out = '<select class="color" id="shnydimatr" name="p[44][]">';
        // $out .= '<option value="0" selected="selected">выберите ширину</option>' . "\n";

        // $pids = SProductsQuery::create()->filterByBrandId($bid)->filterByCategoryId($cid)->select(array('Id'))->distinct()->find()->toArray();
        // $shirina = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(42)->filterByValue($shirina)->distinct()->select(array('ProductId'))->find()->toArray();
        // $vysota = SProductPropertiesDataQuery::create()->filterByProductId($shirina)->filterByPropertyId(43)->filterByValue($vysota)->distinct()->select(array('ProductId'))->find()->toArray();
        // $diametr = SProductPropertiesDataQuery::create()->filterByProductId($vysota)->filterByPropertyId(44)->distinct()->select(array('Value'))->find()->toArray();

        if (count($diametr) > 0) {
            foreach ($diametr as $v) {
                
             $out .= '<option value="' . $v . '">' . $v . '</option>' . "\n";
            }
        }
        // echo $out . '</select>';
    }


    

    


    public function getDiametr() {
        $bid = (int) $_POST['bid'];
        $out = '<select class="color" id="diametr" name="p[59][]">';
        $out .= '<option value="0" selected="selected">выберите диаметр</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->select(array('Id'))->find()->toArray();
        $diamers = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(59)->distinct()->select(array('Value'))->find()->toArray();

        if (count($diamers) > 0) {
            foreach ($diamers as $v) {
                $out .= '<option value="' .$v . '">' . $v . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

       public function getDiscType() {
        $bid = (int) $_POST['bid'];
        $diam = $_POST['diam'];

        $out = '<select class="color" id="disctype" name="p[65][]">';
        $out .= '<option value="0" selected="selected">выберите тип</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->select(array('Id'))->find()->toArray();
        $diamers = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(59)->filterByValue($diam)->distinct()->select(array('ProductId'))->find()->toArray();

        $type = SProductPropertiesDataQuery::create()->filterByProductId($diamers)->filterByPropertyId(65)->distinct()->select(array('Value'))->find()->toArray();

        if (count($type) > 0) {
            foreach ($type as $v) {
                $out .= '<option value="' .$v . '">' . $v . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

    public function getPCD() {
        $bid = (int) $_POST['bid'];
        $diam =  $_POST['diam'];
        $type =  $_POST['type'];

        $out = '<select class="color" id="pcd" name="p[60][]">';
        $out .= '<option value="0" selected="selected">выберите PCD</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->select(array('Id'))->find()->toArray();
        $diamers = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(59)->filterByValue($diam)->distinct()->select(array('ProductId'))->find()->toArray();
        $type = SProductPropertiesDataQuery::create()->filterByProductId($diamers)->filterByPropertyId(65)->filterByValue($type)->distinct()->select(array('ProductId'))->find()->toArray();

        $pcd = SProductPropertiesDataQuery::create()->filterByProductId($diamers)->filterByPropertyId(60)->distinct()->select(array('Value'))->find()->toArray();

        if (count($pcd) > 0) {
            foreach ($pcd as $v) {
                $out .= '<option value="' .$v . '">' . $v . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

     public function getET() {
        $bid = (int) $_POST['bid'];
        $diam =  $_POST['diam'];
        $type =  $_POST['type'];
        $pcd =  $_POST['pcd'];

        $out = '<select class="color" id="et" name="p[62][]">';
        $out .= '<option value="0" selected="selected">выберите вылет ET</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->select(array('Id'))->find()->toArray();
        $diamers = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(59)->filterByValue($diam)->distinct()->select(array('ProductId'))->find()->toArray();
        $type = SProductPropertiesDataQuery::create()->filterByProductId($diamers)->filterByPropertyId(65)->filterByValue($type)->distinct()->select(array('ProductId'))->find()->toArray();
        $pcd = SProductPropertiesDataQuery::create()->filterByProductId($type)->filterByPropertyId(60)->filterByValue($pcd)->distinct()->select(array('ProductId'))->find()->toArray();


        $et = SProductPropertiesDataQuery::create()->filterByProductId($diamers)->filterByPropertyId(62)->distinct()->select(array('Value'))->find()->toArray();

        if (count($et) > 0) {
            foreach ($et as $v) {
                $out .= '<option value="' .$v . '">' . $v . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

      public function getStupica() {
        $bid = (int) $_POST['bid'];
        $diam =  $_POST['diam'];
        $type =  $_POST['type'];
        $pcd =  $_POST['pcd'];
        $et =  $_POST['et'];

        

        $out = '<select class="color" id="stupica" name="p[63][]">';
        $out .= '<option value="0" selected="selected">выберите ступицу</option>' . "\n";

        $pids = SProductsQuery::create()->filterByBrandId($bid)->select(array('Id'))->find()->toArray();
        $diamers = SProductPropertiesDataQuery::create()->filterByProductId($pids)->filterByPropertyId(59)->filterByValue($diam)->distinct()->select(array('ProductId'))->find()->toArray();
        $type = SProductPropertiesDataQuery::create()->filterByProductId($diamers)->filterByPropertyId(65)->filterByValue($type)->distinct()->select(array('ProductId'))->find()->toArray();
        $pcd = SProductPropertiesDataQuery::create()->filterByProductId($type)->filterByPropertyId(60)->filterByValue($pcd)->distinct()->select(array('ProductId'))->find()->toArray();
    
        $et = SProductPropertiesDataQuery::create()->filterByProductId($pcd)->filterByPropertyId(62)->filterByValue($et)->distinct()->select(array('ProductId'))->find()->toArray();


        

        $stupica = SProductPropertiesDataQuery::create()->filterByProductId($et)->filterByPropertyId(63)->distinct()->select(array('Value'))->find()->toArray();

        if (count($stupica) > 0) {
            foreach ($stupica as $v) {
                $out .= '<option value="' .$v . '">' . $v . '</option>' . "\n";
            }
        }
        echo $out . '</select>';
    }

    

    

    public function getPropSelectOptions($cid, $prid, $sel, $noinp = 0) {
        $out = '<select class="color" id="' . $sel . '" name="' . $sel . '" onchange="setMainFilterFormAction()">';
        $out .= '<option value="0" selected="selected">выбрать</option>' . "\n";
        if ($cid && $cid != 0 && $prid && $prid != 0 && $cur_cat = SCategoryQuery::create()->findPk($cid)) {
            $ci = & get_instance();
            //$prods = $ci->db->query("SELECT DISTINCT product_id FROM shop_product_properties_data JOIN shop_product_properties_categories ON shop_product_properties_categories.property_id=shop_product_properties_data.property_id JOIN shop_product_properties ON shop_product_properties.id=shop_product_properties_categories.property_id WHERE shop_product_properties.active=1 AND shop_product_properties.show_in_filter=1 AND shop_product_properties.id=$prid AND category_id=$cid");
            //$prods = $ci->db->query("SELECT DISTINCT product_id FROM shop_product_categories WHERE category_id=$cid");
            $props = $ci->db->query("SELECT DISTINCT value FROM shop_product_properties_data WHERE product_id IN (SELECT DISTINCT product_id FROM shop_product_properties_data JOIN shop_product_properties_categories ON shop_product_properties_categories.property_id=shop_product_properties_data.property_id JOIN shop_product_properties ON shop_product_properties.id=shop_product_properties_categories.property_id WHERE shop_product_properties.active=1 AND shop_product_properties.show_in_filter=1 AND shop_product_properties.id=$prid AND category_id=$cid) AND product_id IN (SELECT DISTINCT product_id FROM shop_product_categories WHERE category_id=$cid) AND property_id=$prid ORDER BY value ASC");

            if ($props->num_rows() > 0) {
                foreach ($props->result() as $p) {
                    $out .= '<option value="' . $p->value . '">' . $p->value . '</option>' . "\n";
                }
            }
            if ($noinp == 1)
                $inp = "<input type='hidden' name='url_season' value='" . $cur_cat->getUrl() . "'>";
        }
        return $out . '</select>' . $inp;
    }


    /*
    public function goCats(){
        //delete existing cats
        //$exCats = array(84, 85, 86, 87, 88, 89);
        //$i = 0;
        //foreach ($cats as $c){
        //    $c->delete();
        //    $i++;
        //}
        //echo count($cats);

        $allCats = array(40, 44, 41, 45, 43, 46, 78, 81, 79, 82, 80, 83);

        $relCat[40] = 84;
        $relCat[44] = 84;

        $relCat[41] = 86;
        $relCat[45] = 86;

        $relCat[43] = 85;
        $relCat[46] = 85;

        $relCat[78] = 87;
        $relCat[81] = 87;

        $relCat[79] = 88;
        $relCat[82] = 88;

        $relCat[80] = 89;
        $relCat[83] = 89;

        $cats = ShopProductCategoriesQuery::create()->filterByCategoryId($allCats)->find();

        $i = 0;
        foreach ($cats as $c){

            $nc = new ShopProductCategories();
            $nc->setCategoryId($relCat[$c->getCategoryId()]);
            $nc->setProductId($c->getProductId());
            $nc->save();

            $i++;
        }

        echo $i;
    }
    */

}

/* End of file shop.php */
