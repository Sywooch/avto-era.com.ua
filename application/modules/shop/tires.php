<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tires extends ShopController {

	private $passengerCSV ;
	private $freightCSV ;
	private $freight = 0;



    public function __construct() {
       

        $this->load->helper('translit');
        ini_set('max_execution_time', 9000000);
        ini_set('memory_limit', '1000M');
        set_time_limit(9000000);

    $this->passengerCSV  =  __DIR__ . '/temp/passenger.csv';
    $this->freightCSV    =  __DIR__ . '/temp/freight.csv';
    @unlink($this->passengerCSV);
    @unlink($this->freightCSV);
    copy('http://tyretrader.ua/download_price.php?code=11c6e640c2c4c1adff96cf6944ea260c2&type=csv', __DIR__ . '/temp/passenger.csv');
    copy('http://tyretrader.ua/download_price.php?code=dedd873d6d6d3838bea17f57cc0088032&type=csv', __DIR__ . '/temp/freight.csv');
     parent::__construct();
    }


   public function makeImport(){
    

if (($handle = fopen($this->passengerCSV, "r")) !== FALSE)
{
  $cnt = 0;
$this->freight = 0;
while ( ($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
  $cnt++;

  
	     $result = $this->db
                    ->limit(1)
                    ->select('shop_product_variants.product_id as ProductId,shop_product_variants.id as VariantId')
                    ->join('shop_products', 'shop_products.id = shop_product_variants.product_id', 'left outer')
                    ->where('number', $data[20])
                    ->get('shop_product_variants')
                    ->row();
            $mas[$key] = (!($result instanceof \stdClass)) ?
                    $this->runProductInsertQuery($data) :
                    $this->runProductUpdateQuery($result->ProductId, $result->VariantId , $data);

}
fclose($handle_f);
} else {$err = 1; echo "Не получилось открыть файл";} 


if (($handle = fopen($this->freightCSV, "r")) !== FALSE)
{
	$this->freight = 1;
while ( ($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
	     $data['freight'] = 1;
	     $result = $this->db
                    ->limit(1)
                    ->select('shop_product_variants.product_id as ProductId,shop_product_variants.id as VariantId')
                    ->join('shop_products', 'shop_products.id = shop_product_variants.product_id', 'left outer')
                    ->where('number', $data[20])
                    ->get('shop_product_variants')
                    ->row();
            $mas[$key] = (!($result instanceof \stdClass)) ?
                    $this->runProductInsertQuery($data) :
                    $this->runProductUpdateQuery($result->ProductId, $result->VariantId , $data);
}
fclose($handle_f);
} else {$err = 1; echo "Не получилось открыть файл";} 

}
    



private function runProductInsertQuery($line){
	$url = $this->urlCheck($line[2]);
	$catId = $this->detectCategory($line[3],$line[11], $line[4]);
	$brdId = $this->checkBrands($line[0]);

	$data = array(
   'url' => $url ,
   'active' => 1 ,
   'brand_id' => $brdId,
   'category_id' => $catId ,
   'created' => time()
    );

$this->db->insert('shop_products', $data); 
$productId = $this->db->insert_id();

$data = array(
   'id' => $productId ,
   'locale' => 'ru' ,
   'name' => $line[2]
    );
$this->db->insert('shop_products_i18n', $data); 


$img = str_replace('products/', '', $line[21]);
if($img && file_exists(__DIR__ . '/../../../uploads/temp/' . $img ))
	@copy(__DIR__ . '/../../../uploads/temp/' . $img , __DIR__ . '/../../../uploads/shop/products/origin/' . $img);
else
	$img = '';

$data = array(
   'product_id' => $productId ,
   'price' => $line[17],
   'number' => $line[20] ,
   'stock' =>  $line[13] ,
   'position' => 0 ,
   'currency' => 4 ,
   'price_in_main' => $line[17] ,
   'mainImage' => $img
       );
$this->db->insert('shop_product_variants', $data); 
$variantId = $this->db->insert_id();

if($img != ''){
 // \MediaManager\Image::create()->resizeById($variantId);
}

$data = array(
   'id' => $variantId ,
   'locale' => 'ru',
       );
$this->db->insert('shop_product_variants_i18n', $data);

$data = array(
   'product_id' => $productId ,
   'category_id' => $catId,
       );
$this->db->insert('shop_product_categories', $data);

$data = array(
     array(
   'product_id' => $productId ,
   'property_id' => 48,
   'value' =>  $line[3] ,
   'locale' => 'ru'
       ) ,
        array(
   'product_id' => $productId ,
   'property_id' => 47,
   'value' =>  $line[4],
   'locale' => 'ru'
       ) ,
   array(
   'product_id' => $productId ,
   'property_id' => 42,
   'value' =>  $line[5],
   'locale' => 'ru'
       ) ,
    array(
   'product_id' => $productId ,
   'property_id' => 43,
   'value' =>  $line[6],
   'locale' => 'ru'
       ) ,
     array(
   'product_id' => $productId ,
   'property_id' => 44,
   'value' =>  $line[7],
   'locale' => 'ru'
       ) ,
       array(
   'product_id' => $productId ,
   'property_id' => 46,
   'value' =>  $line[8],
   'locale' => 'ru'
       ) ,
         array(
   'product_id' => $productId ,
   'property_id' => 45,
   'value' =>  $line[9],
   'locale' => 'ru'
       ) ,

            array(
   'product_id' => $productId ,
   'property_id' => 51,
   'value' =>  $line[11],
   'locale' => 'ru'
       ) ,


   );

$this->db->insert_batch('shop_product_properties_data', $data);



}

private function runProductUpdateQuery($pid,$vid,$line){


$data = array(
   'name' => $line[2]
    );
$this->db->update('shop_products_i18n', $data, "id = $pid");


$img = str_replace('products/', '', $line[21]);
if(!file_exists(__DIR__ . '/../../../uploads/shop/products/origin/' . $img))
if($img && file_exists(__DIR__ . '/../../../uploads/temp/' . $img )){
//	@copy(__DIR__ . '/../../../uploads/temp/' . $img , __DIR__ . '/../../../uploads/shop/products/origin/' . $img);
$data = array(
   'mainImage' => $img
       );
$this->db->update('shop_product_variants', $data, "id = $vid");
// \MediaManager\Image::create()->resizeById($vid);

}

$data = array(
   'price' => $line[17],
   'stock' =>  $line[13] ,
   'price_in_main' => $line[17] ,
       );
$this->db->update('shop_product_variants', $data, "id = $vid");



$data = array('value' =>  $line[3]) ;
$this->db->update('shop_product_properties_data', $data, array('property_id' => 48,'product_id' => $pid));

$data = array('value' =>  $line[4]) ;
$this->db->update('shop_product_properties_data', $data, array('property_id' => 47,'product_id' => $pid));

$data = array('value' =>  $line[5]) ;
$this->db->update('shop_product_properties_data', $data, array('property_id' => 42,'product_id' => $pid));

$data = array('value' =>  $line[6]) ;
$this->db->update('shop_product_properties_data', $data, array('property_id' => 43,'product_id' => $pid));

$data = array('value' =>  $line[7]) ;
$this->db->update('shop_product_properties_data', $data, array('property_id' => 44,'product_id' => $pid));

$data = array('value' =>  $line[8]) ;
$this->db->update('shop_product_properties_data', $data, array('property_id' => 46,'product_id' => $pid));
  
$data = array('value' =>  $line[9]) ;
$this->db->update('shop_product_properties_data', $data, array('property_id' => 45,'product_id' => $pid));

// $data = array('value' =>  $line[10]) ;
// $this->db->update('shop_product_properties_data', $data, array('property_id' => 50,'product_id' => $pid));

$data = array('value' =>  $line[11]) ;
$this->db->update('shop_product_properties_data', $data, array('property_id' => 51,'product_id' => $pid));



}

    private function detectCategory($sezon,$shyp,$type) {
if($this->freight == 1) return 45;
if($type == 'легковой'){
	if($sezon == 'летняя') return 80;
	
	if($sezon == 'зимняя'){
		if($shyp == 'нешип') return 43;
		if($shyp == 'шип') return 79;
		if($shyp == 'под шип') return 78;
	}
	if($sezon == 'всесезонная') return 41;

}


if($type == 'микроавтобус'){
	if($sezon == 'летняя') return 93;
	if($sezon == 'зимняя') return 96;
	if($sezon == 'всесезонная') return 99;
}

if($type == 'внедорожник'){
	if($sezon == 'летняя') return 94;
	if($sezon == 'зимняя') return 97;
	if($sezon == 'всесезонная') return 100;
}
if($type == 'мото'){
	if($sezon == 'летняя') return 95;
	if($sezon == 'зимняя') return 98;
	if($sezon == 'всесезонная') return 101;
}

    }

 protected function checkBrands($brd) {
        $this->load->helper('translit');
       
            if (isset($brd) && !empty($brd)) {
                $result = $this->db->query("
                SELECT SBrands.id as BrandId
                FROM `shop_brands` as SBrands
                LEFT OUTER JOIN `shop_brands_i18n` AS SBrandsI18n ON SBrandsI18n.id = SBrands.id
                WHERE SBrandsI18n.name = ?
                LIMIT 1", array($brd))->row();
                if (!($result instanceof \stdClass)) {
                    $this->db->insert('shop_brands', array('url' => translit_url($brd)));
                    $brandId = $this->db->insert_id();
                    $this->db->insert('shop_brands_i18n', array('name' => $brd, 'locale' => 'ru', 'id' => $brandId));
                   return $brandId;
                } else {
                  return $result->BrandId;
                }
            }
        
    }

    private function urlCheck($name) {
        $url = translit_url(trim($name));

        $urlCheck = $this->db
                ->select('url')
                ->where('url ', $url)
                ->get('shop_products')
                ->row();

        if (count($urlCheck) == 0)
            return $url;
        else
            return $id . '_' . random_string('alnum', 8);
    }

}

/* End of file shop.php */
