<?php

namespace ImportCSV;

use ImportCSV\CategoryImport as CategoriesHandler;
use ImportCSV\PropertiesImport as PropertiesHandler;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductsExport extends BaseExport {

    public function __construct(&$settings) {
        parent::__construct($settings);
    }

    /**
     * Start Export process
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function make() {
        $CI = &get_instance();
        $products = $this->loadAllProducts();
        $this->columnsToAttributes();

        $enclosure = $this->enclosure;
        $delimiter = $this->delimiter;
        $defaultRow = array_combine($attributes, array_fill(0, sizeof($attributes), ''));
        $newLine = PHP_EOL;
        $list = array();
        foreach ($products as $product) {
            $variants = $product->getProductVariants();
            foreach ($variants as $variant) {
                $row = $defaultRow;
                foreach ($attributes as $attribute) {

                    if ($attribute == 'currency') {

                        $row['currency'] = $CI->db->select('code')
                                        ->get_where('shop_currencies', array('id' => $variant->getCurrency()))
                                        ->row()->code;
                    }

                    if (method_exists($product, 'get' . $attribute)) {
                        $func = 'get' . $attribute;
                        $row[$attribute] = $product->$func();
                    }

                    if (method_exists($variant, 'get' . $attribute)) {
                        $func = 'get' . $attribute;
                        $row[$attribute] = $variant->$func();
                    }

                    // Process name and variant name
                    if (!in_array('Variant', $attributes) && $attribute == 'Name') {
                        $row['Name'] = $product->getName();
//                        $row['Name'] = $product->getName().' '.$variant->getName();
                    } elseif (in_array('Variant', $attributes)) {
                        $row['Name'] = $product->getName();
                        $row['Variant'] = $variant->getName();
                    }

                    // Process brand
                    if ($attribute == 'BrandId') {
                        $brand = $product->getBrand();
                        if ($brand !== null)
                            $row['BrandId'] = $brand->getName();
                        else
                            $row['BrandId'] = '';
                    }

                    // Process category
                    if ($attribute == 'CategoryName') {
                        $row['CategoryName'] = $this->processCategoryName($product->getCategoryId());
                    }

                    // Process additional images.
                    if ($attribute == 'AdditionalImages') {
                        $images = $product->getSProductImagess();
                        if (sizeof($images) > 0) {
                            $images_arr = array();
                            foreach ($images as $img) {
                                array_push($images_arr, $img->getImageName());
                            }
                            $row['AdditionalImages'] = implode(',', $images_arr);
                        }
                    }
                }
                $list[] = array_map('trim', $row);
            }
        }
    }

    /**
     * Load all shop products
     * @param SProductsQuery $model
     */
    public function loadAllProducts() {
        $model = \SProductsQuery::create()
                ->joinWithI18n($_POST['language'])
                ->leftJoinProductVariant()
                ->leftJoinSProductImages()
                ->leftJoinBrand()
                ->leftJoinSProductPropertiesData()
                ->orderByCategoryId()
                ->distinct()
                ->find();

        // Populate product relations.
        $model->populateRelation('ProductVariant');
        $model->populateRelation('SProductImages');
        $model->populateRelation('Brand');
        $model->populateRelation('SProductPropertiesData');

        return $model;
    }

    public function processCategoryName($id) {
        $result = array();
        $category = $this->tree[$id];
        $idsPath = unserialize($category->getFullPathIds());

        if ($idsPath === false)
            $idsPath = array();

        array_push($idsPath, $id); // Push self id.

        foreach ($idsPath as $categoryId) {
            $result[] = preg_replace('/\//', '\/', $this->tree[$categoryId]->getName());
        }

        return implode('/', $result);
    }

    /**
     * Load custom fields.
     *
     * @access public
     */
    public function prepareCustomFields() {
        $fields = SPropertiesQuery::create()
                ->find();

        if (sizeof($fields) > 0) {
            foreach ($fields as $f) {
                $this->customFieldsCache[$f->getCsvName()] = $f;
            }
        }
    }

    protected function columnsToAttributes() {
        $abbreviations = array(
            'name' => 'Name',
            'url' => 'Url',
            'oldprc' => 'OldPrice',
            'prc' => 'Price',
            'stk' => 'Stock',
            'num' => 'Number',
            'var' => 'Variant',
            'act' => 'Active',
            'hit' => 'Hit',
            'brd' => 'BrandId',
            'modim' => 'MainModImage',
            'modis' => 'SmallModImage',
            'cat' => 'CategoryName',
            'relp' => 'RelatedProducts',
//            'mimg' => 'MainImage',
            'vimg' => 'mainImage',
//            'vsimg' => 'SmallImage',
            'cur' => 'currency',
//            'simg' => 'SmallImage',
            'imgs' => 'AdditionalImages',
            'shdesc' => 'ShortDescription',
            'desc' => 'FullDescription',
            'mett' => 'MetaTitle',
            'metd' => 'MetaDescription',
            'metk' => 'MetaKeywords',
            'skip' => 'skip',
        );

//        if (sizeof($this->customFieldsCache) > 0) {
//            foreach ($this->customFieldsCache as $key => $val) {
//                $abbreviations[$key] = $key;
//            }
//        }
        foreach ($_POST['attribute'] as $key => $value) {
            $this->attributes[$key] = $abbreviations['name'];
        }

//        $attributes = str_replace(array_keys($abbreviations), $abbreviations, $this->attributes);
//        $attributes = array_map('trim', explode(',', $attributes));
//
//        foreach ($attributes as $key => $val) {
//            if (!in_array($val, $abbreviations)) {
//                $this->addError('Unknown column: ' . $val);
//            }
//        }

        $this->attributes = $attributes;

        return true;
    }

}