<?php

use ImportCSV\CategoryImport;
use ImportCSV\ProductsImport;

class ShopImport {

    public $delimiter = ";";
    public $imageSizes = array();
    public $maxRowLength = 10000;
    public $enclosure = '"';
    public $file = null;
    public $currency = null;
    public $encoding = 'utf8';
    public $language = 'ru';
    public $attributes = array();
    public $errors = array();
    public $categoryCache = array(); // Cache categories by name.
    public $subCategoryDelimiter = '/';
    public $subCategoryPattern = '/\\REPLACE((?:[^\\\\\REPLACE]|\\\\.)*)/';
    public $con = null;
    public $imageSource = null;
    public $imageOrigin = null;
    public $class_map = array('CategoryImport', 'ProductsImport', 'import_properties');

    public function __construct($file, array $settings = array()) {

        if (!is_readable($file))
            $this->showMessage('Ошибка открытия файла.');
        if (!in_array($settings['import_type'], $this->class_map))
            $this->showMessage('Ошибка разбора запроса.');

        switch ($settings['import_type']) {
            case 'CategoryImport':
                $Import = new CategoryImport($file, $settings);
                break;
            case 'ProductsImport':
                $Import = new ProductsImport($file, $settings);
                $Import->make();
                break;
            default:
                $this->addError('Ошибка разбора запроса.');
        }
    }

    /**
     * addError
     *
     * @param mixed $msg
     * @access protected
     * @return void
     */
    public function addError($msg) {
        $this->errors[] = $msg;
    }

    /**
     * Check for errors
     *
     * @access public
     * @return boolean
     */
    public function hasErrors() {
        if (sizeof($this->errors) > 0)
            return true;
        else
            return false;
    }

    /**
     * Get errors array
     *
     * @access public
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }

}


//
///**
// * ShopImport - imports products from CVS file.
// *
// * @package
// * @version $id$
// * @copyright
// * @author <dev@imagecms.net>
// * @license
// */
//class ShopImport {
//
//    public $delimiter = ";";
//    public $imageSizes = array();
//    public $maxRowLength = 10000;
//    public $enclosure = '"';
//    public $file = null;
//    public $encoding = 'utf8';
//    public $language = 'ru';
//    public $attributes = array();
//    public $errors = array();
//    public $categoryCache = array(); // Cache categories by name.
//    public $subCategoryDelimiter = '/';
//    public $subCategoryPattern = '/\\REPLACE((?:[^\\\\\REPLACE]|\\\\.)*)/';
//    public $con = null;
//    public $imageSource = null;
//    public $imageOrigin = null;
//    public $sqlNamesNew = array(
//        'Name' => 'name',
//        'ShortDescription' => 'short_description',
//        'FullDescription' => 'full_description',
//        'MetaTitle' => 'meta_title',
//        'MetaDescription' => 'meta_description',
//        'MetaKeywords' => 'meta_keywords',
//    );
//    public $sqlNamesProdVar = array(
//        'OldPrice' => 'old_price',
//        'Url' => 'url',
//        'Active' => 'active',
//        'Hit' => 'hit',
//        'BrandId' => 'brand_id',
//        'CategoryId' => 'category_id',
//        'RelatedProducts' => 'related_products',
//        'MainImage' => 'mainImage',
//        'MainModImage' => 'mainModImage',
//        'SmallImage' => 'smallImage',
//        'SmallModImage' => 'smallModImage',
//    );
//    public $customFieldsIds = array(); // Store ids from field names. e.g array('field_1'=>1);
//    public $processCustomFields = false;
//    public $customFieldsCache = array();
//
//    public function __construct($file, array $settings = array()) {
//
//        $this->imageSizes['mainImageWidth'] = ShopCore::app()->SSettings->mainImageWidth;
//        $this->imageSizes['mainImageHeight'] = ShopCore::app()->SSettings->mainImageHeight;
//        $this->imageSizes['smallImageWidth'] = ShopCore::app()->SSettings->smallImageWidth;
//        $this->imageSizes['smallImageHeight'] = ShopCore::app()->SSettings->smallImageHeight;
//        $this->imageSizes['mainModImageWidth'] = ShopCore::app()->SSettings->mainModImageWidth;
//        $this->imageSizes['mainModImageHeight'] = ShopCore::app()->SSettings->mainModImageHeight;
//        $this->imageSizes['smallModImageWidth'] = ShopCore::app()->SSettings->smallModImageWidth;
//        $this->imageSizes['smallModImageHeight'] = ShopCore::app()->SSettings->smallModImageHeight;
//        $this->imageSizes['maxImageWidth'] = ShopCore::app()->SSettings->addImageWidth;
//        $this->imageSizes['maxImageHeight'] = ShopCore::app()->SSettings->addImageHeight;
//        $this->imageSizes['smallAddImageWidth'] = ShopCore::app()->SSettings->smallAddImageWidth;
//        $this->imageSizes['smallAddImageHeight'] = ShopCore::app()->SSettings->smallAddImageHeight;
//
//        $this->initialize($settings);
//        $this->file = $file;
//
//        $this->language = $settings['languages'];
//
//        if (!is_readable($file))
//            $this->addError('Ошибка открытия файла.');
//
//        $this->subCategoryPattern = str_replace('REPLACE', $this->subCategoryDelimiter, $this->subCategoryPattern);
//
//        $this->prepareCustomFields();
//        $this->columnsToAttributes();
//
//        ShopCore::$ci->load->helper('translit');
//        $this->con = Propel::getConnection();
//    }
//
//    /**
//     * Initialize settings
//     *
//     * @param array $settings
//     * @access public
//     */
//    public function initialize($settings) {
//// Init settings
//        if (sizeof($settings) > 0) {
//            foreach ($settings as $key => $value) {
//                if (isset($this->$key))
//                    $this->$key = $value;
//            }
//        }
//    }
//
//    public function columnsToAttributes() {
//        $abbreviations = array(
//            'name' => 'Name',
//            'url' => 'Url',
//            'oldprc' => 'OldPrice',
//            'prc' => 'Price',
//            'stk' => 'Stock',
//            'num' => 'Number',
//            'var' => 'Variant',
//            'act' => 'Active',
//            'hit' => 'Hit',
//            'brd' => 'BrandId',
//            'cat' => 'CategoryName',
//            'relp' => 'RelatedProducts',
//            'mimg' => 'MainImage',
//            'simg' => 'SmallImage',
//            'modim' => 'MainModImage',
//            'modis' => 'SmallModImage',
//            'imgs' => 'AdditionalImages',
//            'shdesc' => 'ShortDescription',
//            'desc' => 'FullDescription',
//            'mett' => 'MetaTitle',
//            'metd' => 'MetaDescription',
//            'metk' => 'MetaKeywords',
//            'skip' => 'skip',
//        );
//
//        $attributes = str_replace(array_keys($abbreviations), $abbreviations, $this->attributes);
//        $attributes = array_map('trim', explode(',', $attributes));
//
//        foreach ($attributes as $key => $val) {
//            if (array_key_exists($val, $this->customFieldsCache)) {
//                $abbreviations[$val] = true;
//                $this->customFieldsIds[$val] = $this->customFieldsCache[$val]->getId();
//            }
//
//            if (!in_array($val, $abbreviations))
//                $this->addError('Неизвестный атрибут: ' . $val);
//        }
//
//        if (sizeof($this->customFieldsIds) > 0)
//            $this->processCustomFields = true;
//
//        if (!in_array('Name', $attributes))
//            $this->addError('Атрибут Имя обязательное поле.');
//
//        if (!in_array('CategoryName', $attributes) && !in_array('Number', $attributes))
//            $this->addError('Категория или Артикул - обязательные поля');
//
//        $this->attributes = $attributes;
//
//        return true;
//    }
//
//    public function import() {
//        $attributesSize = sizeof($this->attributes);
//
//        if ($this->encoding == 'cp1251') {
//            $string = file_get_contents($this->file);
//            $string = iconv('cp1251', 'utf-8', $string);
//            $temp = tmpfile();
//            fwrite($temp, $string);
//            fseek($temp, 0);
//            $file = $temp;
//        } else {
//// Read file
//            $file = fopen($this->file, 'r');
//        }
//
//        $line = 0;
//        while (($row = fgetcsv($file, $this->maxRowLength, $this->delimiter, $this->enclosure)) !== false) {
//// If sizes of two arrays are equal - add product
//            if (sizeof($row) === $attributesSize) {
//                $row = array_map('trim', $row);
//                $this->processDataRawSql(array_combine($this->attributes, $row));
//            }
//            $line++;
//        }
//
//        fclose($file);
//
//// Update products empty urls.
//        Propel::getConnection(SProductsPeer::DATABASE_NAME)
//                ->prepare("UPDATE " . SProductsPeer::TABLE_NAME . " SET url=id WHERE url=''")
//                ->execute();
//    }
//
////----------------------------------
//    public function processDataRawSql(array $data) {
//        if (empty($data['CategoryName']))
//            return;
//
//        $categoryModel = null;
//        $productModel = false;
//        $binds = array(':name' => $data['Name']);
//        $c = '';
//
//// Prepare price
//        if (!empty($data['Price']))
//            $data['Price'] = preg_replace('/,/', '.', $data['Price']);
//
//// First search product by Number.
//        if (!empty($data['Number'])) {
//            $sql = 'SELECT product_id as id FROM shop_product_variants WHERE number=:number LIMIT 1';
//            $result = $this->runQuery($sql, array(':number' => $data['Number']));
//            $productModel = $result->fetch();
//            if (isset($data['CategoryName']) && !empty($data['CategoryName'])) {
//                $catId = $this->loadCategory($data['CategoryName'], $data['Number'], $productModel);
//            }
//        }
//
//// Search product by category/brand/name
//        if ($productModel === false) {
//// Filter by category
//            if (isset($data['CategoryName']) && !empty($data['CategoryName'])) {
//                $catId = $this->loadCategory($data['CategoryName'], $data['Number']);
//                $data['CategoryId'] = $catId;
//                $c .= ' AND shop_products.category_id=:category_id ';
//                $binds[':category_id'] = $catId;
//            }
//
//// Filter by brand
////            if (isset($data['BrandId']) && !empty($data['BrandId'])) {
////                $brandId = $this->loadBrand($data['BrandId']);
////                $data['BrandId'] = $brandId;
////                $c .= ' AND shop_products.brand_id=:brand_id ';
////                $binds[':brand_id'] = $brandId;
////            }
//
//            $sql = 'SELECT shop_products.id as id FROM shop_products LEFT JOIN shop_products_i18n ON shop_products_i18n.id = shop_products.id WHERE shop_products_i18n.name=:name ' . $c . ' LIMIT 1';
//            $result = $this->runQuery($sql, $binds);
//            $productModel = $result->fetch();
//            $idNoLocale = $productModel['id'];
//
//            $c .= ' AND shop_products_i18n.locale=:locale';
//            $binds[':locale'] = $this->language;
//
//            $sql = 'SELECT shop_products.id as id FROM shop_products LEFT JOIN shop_products_i18n ON shop_products_i18n.id = shop_products.id WHERE shop_products_i18n.name=:name ' . $c . ' LIMIT 1';
//            $result = $this->runQuery($sql, $binds);
//            $productModel = $result->fetch();
//
////            echo $this->con->getLastExecutedQuery();
//        }
//
//// Product not found. Create.
//        if ($productModel === false) {
//            if (!$idNoLocale) {
//                $sql = 'SELECT shop_products.id as id FROM shop_products LEFT JOIN shop_products_i18n ON shop_products_i18n.id = shop_products.id WHERE shop_products_i18n.name=:name ' . $c . ' LIMIT 1';
//                $result = $this->runQuery($sql, $binds);
//                $productModel = $result->fetch();
//
//                $prep = $this->prepareProductInsertQuery($data, $catId);
//                $result = $this->runQuery($prep['sql'], $prep['binds']);
//
//                $pid = $this->con->lastInsertId(); // ProductId.
//                $productModel['id'] = $pid;
//
//                $sql = 'UPDATE shop_products SET url=' . $pid . ', brand_id=:brand_id WHERE id=' . $pid;
//                $this->runQuery($sql, array(
//                    ':brand_id' => $brandId));
//            } else {
//                $pid = $idNoLocale;
//                $productModel['id'] = $idNoLocale;
//            }
//
//
//            $sql = 'INSERT INTO shop_products_i18n (id,locale, name, short_description,full_description,meta_title,meta_description,meta_keywords)
//                VALUES (:product_id, :locale, :name, :short_description, :full_description, :meta_title, :meta_description, :meta_keywords )';
//            $result = $this->runQuery($sql, array(
//                ':product_id' => $productModel['id'],
//                ':name' => $data['Name'],
//                ':short_description' => $data['ShortDescription'],
//                ':full_description' => $data['FullDescription'],
//                ':meta_title' => $data['MetaTitle'],
//                ':meta_description' => $data['MetaDescription'],
//                ':meta_keywords' => $data['MetaKeywords'],
//                ':locale' => $this->language,
//                    ));
//            if (!$idNoLocale) {
//                $sql = 'INSERT INTO shop_product_categories (product_id,category_id) VALUES (:product_id,:category_id)';
//                $result = $this->runQuery($sql, array(
//                    ':product_id' => $pid,
//                    ':category_id' => $catId,
//                        ));
//            }
//
//            $sql = 'INSERT INTO shop_product_variants (product_id,price,number,stock) VALUES (:product_id,:price,:number,:stock)';
//            $result = $this->runQuery($sql, array(
//                ':product_id' => $pid,
//                ':price' => $data['Price'],
//                ':number' => $data['Number'],
//                ':stock' => $data['Stock'],
//                    ));
//
//            $vid = $this->con->lastInsertId(); // ProductId.
//            if ($data['Variant'])
//                $nameV = $data['Variant'];
//            else
//                $nameV = $data['Name'];
//
//            $sql = 'INSERT INTO shop_product_variants_i18n (id, locale ,name) VALUES (:v_id, :locale, :name)';
//            $result = $this->runQuery($sql, array(
//                ':v_id' => $vid,
//                ':locale' => $this->language,
//                ':name' => $nameV,
//                    ));
//
//// Insert product additional images only from new products.
//            if (isset($data['AdditionalImages']) && !empty($data['AdditionalImages'])) {
//                $imagePos = 0;
//                $additionalImages = array_map('trim', explode(',', $data['AdditionalImages']));
//
//                foreach ($additionalImages as $image_name) {
//                    $imgSql = 'INSERT INTO shop_product_images (product_id,image_name,position) VALUES (:product_id,:image_name,:position)';
//                    $this->runQuery($imgSql, array(
//                        ':product_id' => $pid,
//                        ':image_name' => $image_name,
//                        ':position' => $imagePos,
//                    ));
//                    $imagePos++;
//                }
//            }
//            $this->makePhoto($data, $pid);
//
//            $prod_up = SProductsQuery::create()->findPk($pid);
//            $prod_up->setMainimage($pid . '_main.jpg');
//            $prod_up->save();
//        } else {
//// Update product
//            $prep = $this->prepareProductUpdateQuery($data, $productModel['id']);
//            $this->runQuery($prep['sql'], $prep['binds']);
//            $this->makePhoto($data, $productModel['id']);
//
//            $prod_up = SProductsQuery::create()->findPk($productModel['id']);
//            $prod_up->setMainimage($productModel['id'] . '_main.jpg');
//            $prod_up->save();
////            echo $this->con->getLastExecutedQuery();
//        }
//        if (isset($data['Variant']) && !empty($data['Variant'])) {
//            $sql = 'SELECT shop_product_variants.id, shop_product_variants.product_id FROM shop_product_variants LEFT JOIN shop_product_variants_i18n ON shop_product_variants_i18n.id = shop_product_variants.id WHERE shop_product_variants.product_id=:product_id AND shop_product_variants_i18n.name=:name LIMIT 1';
//            $result = $this->runQuery($sql, array(
//                ':product_id' => $productModel['id'],
//                ':name' => $data['Variant'],
//                    ));
//
//            $result = $result->fetch();
//
//            if (isset($result['id'])) {
//                $sql = 'UPDATE shop_product_variants SET price=:price,number=:number,stock=:stock WHERE product_id=:product_id AND id=:variant_id LIMIT 1';
//                $this->runQuery($sql, array(
//                    ':price' => $data['Price'],
//                    ':number' => $data['Number'],
//                    ':stock' => $data['Stock'],
//                    ':product_id' => $productModel['id'],
//                    ':variant_id' => $result['id']));
//
//
//
//                $sql = 'UPDATE shop_product_variants_i18n SET name=:name,locale=:locale WHERE id=:variant_id LIMIT 1';
//                $this->runQuery($sql, array(
//                    ':name' => $data['Variant'],
//                    ':locale' => $this->language,
//                    ':variant_id' => $result['id']
//                ));
//            } else {
//                $sql = 'INSERT INTO shop_product_variants (product_id,price,number,stock) VALUES (:product_id,:price,:number,:stock)';
//                $this->runQuery($sql, array(
//                    ':product_id' => $productModel['id'],
//                    ':price' => $data['Price'],
//                    ':number' => $data['Number'],
//                    ':stock' => $data['Stock'],
//                ));
//
//                $vid = $this->con->lastInsertId();
//
//                $sql = 'INSERT INTO shop_product_variants_i18n (id, name, locale) VALUES (:id,:name,:locale)';
//                $this->runQuery($sql, array(
//                    ':name' => $data['Variant'],
//                    ':locale' => $this->language,
//                    ':id' => $vid));
//            }
//        }
//
//        /*          CFields         */
//// Process product custom fields data.
//
//        if ($this->processCustomFields === true) {
//            foreach ($data as $key => $val) {
//                if (array_key_exists($key, $this->customFieldsIds)) {
//                    $cs = SProductPropertiesDataQuery::create()
//                            ->filterByProductId($productModel['id'])
//                            ->filterByPropertyId($this->customFieldsIds[$key])
//                            ->findOne();
//
//                    if ($cs === null) {
//                        $cs = new SProductPropertiesData;
//                        $cs->setProductId($productModel['id']);
//                        $cs->setPropertyId($this->customFieldsIds[$key]);
//                    } else {
//                        if (empty($val)) {
//                            $cs->delete();
//                            return;
//                        }
//                    }
//
//                    $cs->setValue($val);
//                    $cs->save();
//
//// Check and update category relations.
//                    $check = ShopProductPropertiesCategoriesQuery::create()
//                            ->filterByPropertyId($this->customFieldsIds[$key])
//                            ->filterByCategoryId($catId)
//                            ->findOne();
//
//                    if ($check === null) {
//                        $sql = 'INSERT INTO shop_product_properties_categories (property_id,category_id) VALUES (:property_id,:category_id)';
//                        $this->runQuery($sql, array(
//                            ':property_id' => $this->customFieldsIds[$key],
//                            ':category_id' => $catId,
//                        ));
//                    }
//
//// Add value to custom field.
//                    $this->addCustomFieldValue($key, $val);
//                }
//            }
//        }
//    }
//
//    public function prepareProductInsertQuery($data, $catId) {
//        $names = $this->sqlNamesProdVar;
//
//        $newNames = array('created', 'updated', 'url');
//        $binds = array();
//        $binds[':created'] = date('U');
//        $binds[':updated'] = date('U');
//        $binds[':url'] = translit_url($data['Url']);
//        foreach ($data as $key => $val) {
//            if (isset($names[$key])) {
//                array_push($newNames, $names[$key]);
//                $binds[':' . $names[$key]] = $val;
//            }
//        }
//
//        return array(
//            'sql' => 'INSERT INTO shop_products (' . implode(',', $newNames) . ') VALUES (' . implode(',', array_keys($binds)) . ')',
//            'binds' => $binds,
//        );
//    }
//
//    public function prepareProductUpdateQuery($data, $product_id) {
//
//        $sql = 'SELECT id FROM shop_products_i18n WHERE locale=:locale AND id=:id LIMIT 1';
//
//        $result = $this->runQuery($sql, array(
//            ':locale' => $this->language,
//            ':id' => $product_id
//                ));
//        $prod = $result->fetch();
//
//        if (!$prod['id']) {
//            $sql = 'INSERT INTO shop_products_i18n (id, name, locale) VALUES (:id,:name,:locale)';
//            $result = $this->runQuery($sql, array(
//                ':id' => $product_id,
//                ':locale' => $this->language,
//                ':name' => $data['Name']
//                    ));
////            $vid = $this->con->lastInsertId(); // ProductId.
//        }
//
//        $names = $this->sqlNamesNew;
//
//        $updateArray = array();
//        $binds = array();
//        foreach ($data as $key => $val) {
//            if (isset($names[$key])) {
//                array_push($updateArray, $names[$key] . '=:' . $names[$key]);
//                $binds[':' . $names[$key]] = $val;
//            }
//        }
//
//        $names = $this->sqlNamesProdVar;
//        $updateArrayPro = array();
//        $binds_pro = array();
//        foreach ($data as $key => $val) {
//            if (isset($names[$key])) {
//                array_push($updateArrayPro, $names[$key] . '=:' . $names[$key]);
//                $binds_pro[':' . $names[$key]] = $val;
//            }
//        }
//        if (isset($binds_pro[':brand_id']))
//            $binds_pro[':brand_id'] = $this->loadBrand($data['BrandId']);
//
//        if ($updateArrayPro) {
//            $sql = 'UPDATE shop_products SET ' . implode(',', $updateArrayPro) . ' WHERE id=' . $product_id . ' LIMIT 1';
//            $this->runQuery($sql, $binds_pro);
//        }
//
//// Update main variant data
//        if (empty($data['Variant'])) {
//            $sql = 'SELECT id FROM shop_product_variants WHERE product_id=:id LIMIT 1';
//            $result = $this->runQuery($sql, array(':id' => $product_id));
//            $vid = $result->fetch();
//
//            $sql = 'SELECT id FROM shop_product_variants_i18n WHERE name=:name AND locale=:locale AND id=:id LIMIT 1';
//            $result = $this->runQuery($sql, array(
//                ':id' => $vid['id'],
//                ':name' => $data['Name'],
//                ':locale' => $this->language));
//            $v = $result->fetch();
//
//            $sql = 'SELECT id FROM shop_product_variants_i18n WHERE name=:name AND id=:id LIMIT 1';
//            $result = $this->runQuery($sql, array(
//                ':id' => $vid['id'],
//                ':name' => $data['Name']));
//            $vnn = $result->fetch();
//
//            if ($vnn && $v === false) {
//                $sql = 'INSERT INTO shop_product_variants_i18n (id, name, locale) VALUES (:id,:name,:locale)';
//                $result = $this->runQuery($sql, array(
//                    ':id' => $vid['id'],
//                    ':locale' => $this->language,
//                    ':name' => $data['Name']));
//            }
//
//            $sql = 'UPDATE shop_product_variants SET price=:price,number=:number,stock=:stock WHERE product_id=' . $product_id . ' LIMIT 1';
//            $this->runQuery($sql, array(
//                ':number' => $data['Number'],
//                ':price' => $data['Price'],
//                ':stock' => $data['Stock']
//            ));
//        }
//
//        return array(
//            'sql' => 'UPDATE shop_products_i18n SET name=:name, short_description=:sdesc, full_description=:fdesc WHERE id=:id AND locale=:locale  LIMIT 1',
//            'binds' => array(
//                ':id' => $product_id,
//                ':name' => $data['Name'],
//                ':sdesc' => $data['ShortDescription'],
//                ':fdesc' => $data['FullDescription'],
//                ':locale' => $this->language
//            ),
//        );
//    }
//
//    public function runQuery($query, $binds = array()) {
//        $req = $this->con->prepare($query);
//        $req->execute($binds);
//        return $req;
//    }
//
////----------------------------------
//
//    /**
//     * Load custom fields.
//     *
//     * @access public
//     */
//    public function prepareCustomFields() {
//        $fields = SPropertiesQuery::create()
//                ->find();
//
//        if (sizeof($fields) > 0) {
//            foreach ($fields as $f) {
//                $f->setVirtualColumn('dataArray', $f->asArray());
//                $f->setData($f->asText());
//                $this->customFieldsCache[$f->getCsvName()] = $f;
//            }
//        }
//    }
//
//    /**
//     * Add new value to custom field and save it.
//     *
//     * @param mixed $name
//     * @param mixed $value
//     * @access public
//     * @return void
//     */
//    public function addCustomFieldValue($name, $value) {
//        if (array_key_exists($name, $this->customFieldsCache)) {
//            $fieldDataArray = $this->customFieldsCache[$name]->getDataArray();
//
//            if ($fieldDataArray === null)
//                $fieldDataArray = array();
//
//            if (!in_array($value, $fieldDataArray)) {
//                array_push($fieldDataArray, $value);
//                $newData = implode("\n", $fieldDataArray);
//                $this->customFieldsCache[$name]->setData($newData);
//                $this->customFieldsCache[$name]->save();
//                $this->customFieldsCache[$name]->setVirtualColumn('dataArray', $fieldDataArray);
//                $this->customFieldsCache[$name]->setData($newData);
//            }
//        }
//    }
//
//    /**
//     * Load or create new categry
//     *
//     * @param string $name Category name
//     * @access protected
//     * @return SCategory model
//     */
//    public function loadCategory($name, $number = null, $productId = null) {
//        $parts = $this->parseCategoryName($name);
//        $pathIds = array();
//        $pathNames = array();
//        $line = 0;
//        $parentId = 0;
//        foreach ($parts as $part) {
//            $pathNames[] = $part;
//
//            $model = SCategoryQuery::create()
//                    ->leftJoinSCategoryI18n()
//                    ->useSCategoryI18nQuery()
//                    ->filterByName($part)
//                    ->filterByLocale($this->language)
//                    ->endUse()
//                    ->filterByParentId($parentId)
//                    ->findOne();
//
////            echo $this->con->getLastExecutedQuery();
//            if (!$model) {
//                $prod = SProductsQuery::create()
//                        ->useProductVariantQuery()
//                        ->filterByNumber($number)
//                        ->endUse()
//                        ->findOne();
//                if ($prod)
//                    $modelNoLocale = SCategoryQuery::create()
//                            ->filterById($prod->getCategoryId())
//                            ->findOne();
//            }
//
//            if ($model) {
//                $parentId = $model->getId();
//                $pathIds[] = $model->getId();
//            } else {
//                if (!$modelNoLocale) {
//                    $pids = serialize($pathIds);
//
//
//                    $fpath = implode('/', array_map('translit_url', $pathNames));
//                    $url = translit_url($part);
//                    $sql = "INSERT INTO shop_category (parent_id, full_path_ids, full_path, url, active) VALUES (:parentId, :pids, :fpath, :url, 1)";
//                    $this->runQuery($sql, array(
//                        ':parentId' => $parentId,
//                        ':pids' => $pids,
//                        ':fpath' => $fpath,
//                        ':url' => $url
//                    ));
//
//                    $сId = $this->con->lastInsertId(); // СategoryId.
//                    $pathIds[] = (int) $сId;
//                } else {
//                    if ($line > 0)
//                        $сId = $modelNoLocale->getId(); // СategoryId.
//                    else
//                        $сId = $modelNoLocale->getParentId(); // СategoryId.
//                }
//
//                $sql = "INSERT INTO shop_category_i18n (id, locale, name) VALUES (:id, :locale, :name)";
//                $this->runQuery($sql, array(
//                    ':name' => $part,
//                    ':locale' => $this->language,
//                    ':id' => $сId
//                ));
//
//                $parentId = $сId;
//            }
//
//            //$pathIds[] = $сId;
//            $line++;
//            if ($productId['id'] && $parentId) {
//                $ci = & get_instance();
//                $prodIds = $productId['id'];
//                $ci->db->query("
//                    UPDATE `shop_product_categories` SET `product_id` = VALUES($prodIds), `category_id` = VALUES($parentId)
//                    WHERE product_id = $prodIds AND category_id = $parentId;");
//            }
//        }
//        //exit;
//        return $parentId;
//    }
//
//    /**
//     * Load or create new brand
//     *
//     * @param string $name Brand name
//     * @access public
//     * @return integer Brand id
//     */
//    public function loadBrand($name) {
////        if (isset($this->brandsCache[$name]))
////            return $this->brandsCache[$name];
//
//        $model = SBrandsQuery::create()
//                ->joinWithI18n()
//                ->useI18nQuery()
//                ->filterByName($name)
////                ->filterByLocale($this->language)
//                ->endUse()
//                ->findOne();
//
//        if ($model === null) {
//            $model = new SBrands;
//            $model->setName($name);
//            $model->setUrl(translit_url($name));
//            $model->setLocale($this->language);
//            $model->save();
//        }
////        $this->brandsCache[$name] = $model->getId();
//
//        return $model->getId();
//    }
//
//    public function parseCategoryName($name) {
//        $result = preg_split($this->subCategoryPattern, $name, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
//        $result = array_map('stripcslashes', $result);
//        $result = array_map('trim', $result);
//
//        return $result;
//    }
//
//    /**
//     * addError
//     *
//     * @param mixed $msg
//     * @access protected
//     * @return void
//     */
//    public function addError($msg) {
//        $this->errors[] = $msg;
//    }
//
//    /**
//     * Check for errors
//     *
//     * @access public
//     * @return boolean
//     */
//    public function hasErrors() {
//        if (sizeof($this->errors) > 0)
//            return true;
//        else
//            return false;
//    }
//
//    /**
//     * Get errors array
//     *
//     * @access public
//     * @return array
//     */
//    public function getErrors() {
//        return $this->errors;
//    }
//
//    /**
//     * Check if file has allowed extension
//     *
//     * @param string $fileName
//     * @access protected
//     * @return bool
//     */
//    protected function _isAllowedExtension($fileName) {
//        $parts = explode('.', $fileName);
//        $ext = strtolower(end($parts));
//
//        if (in_array($ext, $this->allowedImageExtensions))
//            return true;
//        else
//            return false;
//    }
//
//    /**
//     * Get image width and height.
//     *
//     * @param string $file_path Full path to image
//     * @access protected
//     * @return mixed
//     */
//    protected function getImageSize($file_path) {
//        if (function_exists('getimagesize') && file_exists($file_path)) {
//            $image = @getimagesize($file_path);
//
//            $size = array(
//                'width' => $image[0],
//                'height' => $image[1],
//            );
//
//            return $size;
//        }
//
//        return false;
//    }
//
//    public function createPhoto(&$productId, $width, $height, $target) {
//        $ci = & get_instance();
//        $ci->load->library('image_lib');
//        $ci->image_lib->clear();
//        $path = $productId . $target . '.jpg';
//        //echo '1';
//        if (file_exists(ShopCore::$imagesUploadPath . $path))
//            unlink(ShopCore::$imagesUploadPath . $path);
//
//        $imageSizes = $this->getImageSize($this->imageOrigin);
//
//        if ($imageSizes['width'] >= $this->imageSizes[$width] OR $imageSizes['height'] >= $this->imageSizes[$height]) {
//
//
//            if ($imageSizes['width'] >= $imageSizes['height'])
//                $config['master_dim'] = 'width';
//            else
//                $config['master_dim'] = 'height';
//
//
//            $config['image_library'] = 'gd2';
//            $config['source_image'] = $this->imageOrigin;
//            $config['create_thumb'] = FALSE;
//            $config['maintain_ratio'] = TRUE;
//            $config['width'] = $this->imageSizes[$width];
//            $config['height'] = $this->imageSizes[$height];
//            $config['new_image'] = ShopCore::$imagesUploadPath . $path;
//            $config['quality'] = 99;
//            $ci->image_lib->initialize($config);
//
//            if ($ci->image_lib->resize())
//                return $path;
//        } else {
//            if (copy($this->imageOrigin, ShopCore::$imagesUploadPath . $path))
//                return $path;
//        }
//        return false;
//    }
//
//    /**
//     *
//     */
//    public function makePhoto(&$data, $productId) {
//
//        $this->imageSource = PUBPATH . '/uploads/temp/' . $data['MainImage'];
//
//
//        if ($data['MainImage'] && !file_exists($this->imageSource) || !is_readable($this->imageSource))
//            return false;
//
//        if (file_exists(ShopCore::$imagesUploadPath . $productId . '_origin.jpg'))
//            return false;
//
//        $this->imageOrigin = ShopCore::$imagesUploadPath . $productId . '_origin.jpg';
//
//        $model = SProductsQuery::create()->filterById($productId)->findOne();
//
//        if ($data['MainImage']) {
//            if (copy($this->imageSource, $this->imageOrigin)) {
//                echo
//                $model->setMainimage($this->createPhoto($productId, 'mainImageWidth', 'mainImageHeight', '_main'));
//                $model->setMainModImage($this->createPhoto($productId, 'mainModImageWidth', 'mainModImageHeight', '_mainMod'));
//                $model->setSmallImage($this->createPhoto($productId, 'smallImageWidth', 'smallImageHeight', '_small'));
//                $model->setSmallModImage($this->createPhoto($productId, 'smallModImageWidth', 'smallModImageHeight', '_smallMod'));
//            }
//        }
//        $model->save();
//        return false;
//        /*
//          $this->load->library('image_lib');
//          // Resize images.
//          if (!empty($_FILES['mainPhoto']['tmp_name']) && $this->_isAllowedExtension($_FILES['mainPhoto']['name']) === true) {
//          $origin = ShopCore::$imagesUploadPath . $model->getId() . '_origin.jpg';
//          move_uploaded_file($_FILES['mainPhoto']['tmp_name'], $origin);
//
//          if (file_exists(ShopCore::$imagesUploadPath . $model->getId() . '_main.jpg'))
//          unlink(ShopCore::$imagesUploadPath . $model->getId() . '_main.jpg');
//
//          $imageSizes = $this->getImageSize($origin);
//
//          if ($imageSizes['width'] >= $this->imageSizes['mainImageWidth'] OR $imageSizes['height'] >= $this->imageSizes['mainImageHeight']) {
//          $config['image_library'] = 'gd2';
//          $config['source_image'] = $origin;
//          $config['create_thumb'] = FALSE;
//          $config['maintain_ratio'] = TRUE;
//          $config['width'] = $this->imageSizes['mainImageWidth'];
//          $config['height'] = $this->imageSizes['mainImageHeight'];
//          $config['new_image'] = ShopCore::$imagesUploadPath . $model->getId() . '_main.jpg';
//          $config['quality'] = $this->imageQuality;
//
//          $this->image_lib->initialize($config);
//
//          if ($this->image_lib->resize()) {
//          $mainImageResized = true;
//          $model->setMainImage($model->getId() . '_main.jpg');
//          }
//          } else {
//          copy($origin, ShopCore::$imagesUploadPath . $model->getId() . '_main.jpg');
//          $mainImageResized = true;
//          $model->setMainImage($model->getId() . '_main.jpg');
//          }
//
//          //make next size variant for MainImage {
//          if ($this->imageSizes['mainModImageWidth'] && $this->imageSizes['mainModImageHeight']) {
//          if (file_exists(ShopCore::$imagesUploadPath . $model->getId() . '_mainMod.jpg'))
//          unlink(ShopCore::$imagesUploadPath . $model->getId() . '_mainMod.jpg');
//
//          if ($imageSizes['width'] >= $this->imageSizes['mainModImageWidth'] || $imageSizes['height'] >= $this->imageSizes['mainModImageHeight']) {
//
//          $this->image_lib->clear();
//          $config['image_library'] = 'gd2';
//          $config['source_image'] = $origin;
//          $config['create_thumb'] = FALSE;
//          $config['maintain_ratio'] = TRUE;
//          $config['width'] = $this->imageSizes['mainModImageWidth'];
//          $config['height'] = $this->imageSizes['mainModImageHeight'];
//          $config['new_image'] = ShopCore::$imagesUploadPath . $model->getId() . '_mainMod.jpg';
//          $config['quality'] = $this->imageQuality;
//
//          $this->image_lib->initialize($config);
//
//          if ($this->image_lib->resize()) {
//          $mainImageResized = true;
//          $model->setMainModImage($model->getId() . '_mainMod.jpg');
//          }
//          } else {
//          copy($origin, ShopCore::$imagesUploadPath . $model->getId() . '_mainMod.jpg');
//          $mainImageResized = true;
//          $model->setMainModImage($model->getId() . '_mainMod.jpg');
//          }
//          }
//          }
//
//          // Image Resized.
//          // Create small image.
//          if (empty($_FILES['smallPhoto']['tmp_name']) && $_POST['autoCreateSmallImage'] == 1 && $mainImageResized === true)
//          $smallImageSource = ShopCore::$imagesUploadPath . $model->getId() . '_main.jpg';
//          elseif (!empty($_FILES['smallPhoto']['tmp_name']) && $this->_isAllowedExtension($_FILES['smallPhoto']['name']) === true)
//          $smallImageSource = $_FILES['smallPhoto']['tmp_name'];
//          else
//          $smallImageSource = false;
//
//          if ($smallImageSource != false) {
//          if (file_exists(ShopCore::$imagesUploadPath . $model->getId() . '_small.jpg'))
//          unlink(ShopCore::$imagesUploadPath . $model->getId() . '_small.jpg');
//
//          $this->image_lib->clear();
//          $config['image_library'] = 'gd2';
//          $config['source_image'] = $smallImageSource;
//          $config['create_thumb'] = FALSE;
//          $config['maintain_ratio'] = TRUE;
//          $config['width'] = $this->imageSizes['smallImageWidth'];
//          $config['height'] = $this->imageSizes['smallImageHeight'];
//          $config['new_image'] = ShopCore::$imagesUploadPath . $model->getId() . '_small.jpg';
//          $config['quality'] = $this->imageQuality;
//
//          $this->image_lib->initialize($config);
//          $this->image_lib->resize();
//          $model->setSmallImage($model->getId() . '_small.jpg');
//
//          if (file_exists(ShopCore::$imagesUploadPath . $model->getId() . '_smallMod.jpg'))
//          unlink(ShopCore::$imagesUploadPath . $model->getId() . '_smallMod.jpg');
//
//          if ($imageSizes['width'] >= $this->imageSizes['smallModImageWidth'] OR $imageSizes['height'] >= $this->imageSizes['smallModImageHeight']) {
//          $this->image_lib->clear();
//          $this->image_lib->clear();
//          $config['image_library'] = 'gd2';
//          $config['source_image'] = $smallImageSource;
//          $config['create_thumb'] = FALSE;
//          $config['maintain_ratio'] = TRUE;
//          $config['width'] = $this->imageSizes['smallModImageWidth'];
//          $config['height'] = $this->imageSizes['smallModImageHeight'];
//          $config['new_image'] = ShopCore::$imagesUploadPath . $model->getId() . '_smallMod.jpg';
//          $config['quality'] = $this->imageQuality;
//
//          $this->image_lib->initialize($config);
//          $this->image_lib->resize();
//          $model->setSmallModImage($model->getId() . '_smallMod.jpg');
//          } else {
//          copy($smallImageSource, ShopCore::$imagesUploadPath . $model->getId() . '_smallMod.jpg');
//          $mainImageResized = true;
//          $model->setSmallModImage($model->getId() . '_smallMod.jpg');
//          }
//          } */
//    }
//
//}