<?

header("Content-Type: text/xml");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0");
header("Cache-Control: max-age=0");
header("Pragma: no-cache");




$link = mysql_connect('localhost', 'imageuser_b-cars', 'NTh8G63u');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db('imageuser_b-cars'); 
mysql_query('SET NAMES cp1251');


date_default_timezone_set('Europe/Moscow');     


echo '<?xml version="1.0" encoding="windows-1251"?>
<price>
<firmName>beautiful-cars.com.ua</firmName>
<firmId>0</firmId>
<categories>
<category>
<id>1</id>
<name>Шины</name>
</category>
</categories>
<items>
';



$id_cat=0;




 
 
 $q="SELECT pi.name AS p_name, pi.short_description,  b.name AS b_name, p.url, pv.price  FROM shop_products AS p
 LEFT JOIN shop_brands_i18n AS b ON (b.id=p.brand_id)
 INNER JOIN shop_products_i18n AS pi ON (pi.id=p.id)
 INNER JOIN shop_product_variants AS pv ON (pv.product_id = p.id)
";
//echo $q;

 $res=mysql_query($q);
  
 while($row=mysql_fetch_array($res))
 {
          echo '<item>
          <categoryId>1</categoryId>
          ';

          echo '<vendor>'.$row['b_name'].'</vendor>
<name>'.$row['p_name'].'</name>
<description/>
<url>'.$row['url'].'</url>
<priceRUAH>'.round($row['price']).'</priceRUAH>
<stock>поставка 2-4 дня</stock>
<guarantee>на балансировку</guarantee>
         </item> ';


  
    
  





    


 }
 
 

 
     echo '</items>
</price>
     ';         
 

    
    


     
           

     mysql_close($link);     

?>
