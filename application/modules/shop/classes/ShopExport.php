<?php
class ShopExport {
	public $delimiter = ";";
	public $maxRowLength = 10000;
	public $file = null;
	public $currency = null;
	public $language = 'ru';
	protected $attributes = '';
	protected $attributesCF = '';
	protected $enclosure = '"';
	protected $errors = array ();
	protected $tree = null;
	public $encoding = 'utf8';
	protected $customFieldsCache = array ();
	public function __construct(array $settings = array()) {
		if (sizeof ( $settings ) > 0) {
			foreach ( $settings as $key => $value ) {
				if (isset ( $this->$key ))
					$this->$key = $value;
			}
		}
		
		if (! $this->attributes)
			$this->addError ( 'Укажите колонки для экспорта.' );
		else {
			$this->prepareCustomFields ();
			$this->columnsToAttributes ();
		}
		
		$this->tree = ShopCore::app ()->SCategoryTree->getTree ();
	}
	
	/**
	 * Export products to csv file.
	 *
	 * @access public
	 * @return generated csv string
	 */
	public function export($type, $ids = FALSE) {
		$CI = &get_instance ();
		$attributes = $this->attributes;
		
		if (! $ids)
			$products = $this->loadAllProducts ();
		else
			$products = $this->loadProductsByIds ( $ids );
		
		$enclosure = $this->enclosure;
		$delimiter = $this->delimiter;
		(count ( $attributes )) or die ( 'Невозможно начать экспорт без указанных атрибутов' );
		$defaultRow = array_combine ( $attributes, array_fill ( 0, sizeof ( $attributes ), '' ) );
		$newLine = PHP_EOL;
		
		$list = array ();
		
		try {
			foreach ( $products as $product ) {
				$variants = $product->getProductVariants ();
				
				foreach ( $variants as $variant ) {
					$row = $defaultRow;
					foreach ( $attributes as $attribute ) {
						
						if (method_exists ( $product, 'get' . $attribute )) {
							$func = 'get' . $attribute;
							$row [$attribute] = $product->$func ();
						}
						
						if (method_exists ( $variant, 'get' . $attribute )) {
							$func = 'get' . $attribute;
							$row [$attribute] = $variant->$func ();
						}
						if (! in_array ( 'Variant', $attributes ) && $attribute == 'Name') {
							$row ['Name'] = $product->getName ();
						} elseif (in_array ( 'Variant', $attributes )) {
							$row ['Name'] = $product->getName ();
							$row ['Variant'] = $variant->getName ();
						}
						if ($attribute == 'BrandId') {
							$brand = $product->getBrand ();
							if ($brand !== null)
								$row ['BrandId'] = $brand->getName ();
							else
								$row ['BrandId'] = '';
						}
						
						if ($attribute == 'CategoryName')
							$row ['CategoryName'] = $this->processCategoryName ( $product->getCategoryId () );
						
						if ($attribute == 'currency')
							$row ['currency'] = $CI->db->select ( 'code' )->get_where ( 'shop_currencies', array (
									'id' => $variant->getCurrency () 
							) )->row ()->code;
						
						if ($attribute == 'AdditionalImages') {
							$images = $product->getSProductImagess ();
							if (sizeof ( $images ) > 0) {
								$images_arr = array ();
								foreach ( $images as $img ) {
									array_push ( $images_arr, $img->getImageName () );
								}
								$row ['AdditionalImages'] = implode ( ',', $images_arr );
							}
						}
						
						if (array_key_exists ( $attribute, $this->customFieldsCache )) {
							$fieldModel = SProductPropertiesDataQuery::create ()->filterByProductId ( $product->getId () )->filterByPropertyId ( $this->customFieldsCache [$attribute]->getId () )->findOne ();
							
							if ($fieldModel !== null) {
								$row [$attribute] = $fieldModel->getValue ();
							} else {
								$row [$attribute] = '';
							}
						}
						
						$memory_limit = ( int ) ini_get ( 'memory_limit' );
						$memory_get_usage = memory_get_usage () / (1024 * 1024);
						
						if ($memory_get_usage + 1 >= $memory_limit) {
							$memory_get_usage += 1;
							throw new Exception ( "Memory limit exceeded! memory_get_usage=$memory_get_usage" );
							exit ();
						}
					}
					$list [] = array_map ( 'trim', $row );
				}
			}
		} catch ( Exception $excep ) {
			$this->addError ( $excep->getMessage () );
		}
		$temp = tmpfile ();
		$out = '';
		foreach ( $_POST ['attribute'] as $key => $value ) {
			$out .= $key . ';';
			$title [$key] = $key;
		}
		
		fwrite ( $temp, $out . $newLine );
		foreach ( $list as $line ) {
			$out = '';
			foreach ( $line as $l )
				$out .= $enclosure . str_replace ( $enclosure, $enclosure . $enclosure, $l ) . $enclosure . $delimiter;
			fwrite ( $temp, $out . $newLine );
		}
		fseek ( $temp, 0 );
		$content = stream_get_contents ( $temp );
		fclose ( $temp );
		
		array_unshift ( $list, $title );
		
		if ($type == 'array')
			return $list;
		elseif ($type == 'str')
			return $content;
	}
	public function exportToArray() {
		$attributes = $this->attributes;
		$products = $this->loadAllProducts ();
		$enclosure = $this->enclosure;
		$delimiter = $this->delimiter;
		(count ( $attributes )) or die ( 'Невозможно начать экспорт без указанных атрибутов' );
		$defaultRow = array_combine ( $attributes, array_fill ( 0, sizeof ( $attributes ), '' ) );
		$newLine = PHP_EOL;
		
		$list = array ();
		foreach ( $products as $product ) {
			$variants = $product->getProductVariants ();
			
			foreach ( $variants as $variant ) {
				$row = $defaultRow;
				foreach ( $attributes as $attribute ) {
					if (method_exists ( $product, 'get' . $attribute )) {
						$func = 'get' . $attribute;
						$row [$attribute] = $product->$func ();
					}
					
					if (method_exists ( $variant, 'get' . $attribute )) {
						$func = 'get' . $attribute;
						$row [$attribute] = $variant->$func ();
					}
					if (! in_array ( 'Variant', $attributes ) && $attribute == 'Name') {
						$row ['Name'] = $product->getName ();
					} elseif (in_array ( 'Variant', $attributes )) {
						$row ['Name'] = $product->getName ();
						$row ['Variant'] = $variant->getName ();
					}
					if ($attribute == 'BrandId') {
						$brand = $product->getBrand ();
						if ($brand !== null)
							$row ['BrandId'] = $brand->getName ();
						else
							$row ['BrandId'] = '';
					}
					
					if ($attribute == 'CategoryName')
						$row ['CategoryName'] = $this->processCategoryName ( $product->getCategoryId () );
					
					if ($attribute == 'AdditionalImages') {
						$images = $product->getSProductImagess ();
						if (sizeof ( $images ) > 0) {
							$images_arr = array ();
							foreach ( $images as $img ) {
								array_push ( $images_arr, $img->getImageName () );
							}
							$row ['AdditionalImages'] = implode ( ',', $images_arr );
						}
					}
					
					if (array_key_exists ( $attribute, $this->customFieldsCache )) {
						$fieldModel = SProductPropertiesDataQuery::create ()->filterByProductId ( $product->getId () )->filterByPropertyId ( $this->customFieldsCache [$attribute]->getId () )->findOne ();
						
						if ($fieldModel !== null) {
							$row [$attribute] = $fieldModel->getValue ();
						} else {
							$row [$attribute] = '';
						}
					}
				}
				$list [] = array_map ( 'trim', $row );
			}
		}
		$temp = tmpfile ();
		$out = '';
		foreach ( $_POST ['attribute'] as $key => $value ) {
			$out .= $key . ';';
		}
		
		fwrite ( $temp, $out . $newLine );
		foreach ( $list as $line ) {
			$out = '';
			foreach ( $line as $l )
				$out .= $enclosure . str_replace ( $enclosure, $enclosure . $enclosure, $l ) . $enclosure . $delimiter;
			fwrite ( $temp, $out . $newLine );
		}
		fseek ( $temp, 0 );
		$content = stream_get_contents ( $temp );
		fclose ( $temp );
		return $content;
	}
	
	/**
	 * Load all shop products
	 * 
	 * @param SProductsQuery $model        	
	 */
	public function loadAllProducts() {
		$model = SProductsQuery::create ()->joinWithI18n ( $this->language )->leftJoinProductVariant ()->leftJoinSProductImages ()->leftJoinBrand ()->leftJoinSProductPropertiesData ()->orderByCategoryId ()->distinct ()->find ();
		$model->populateRelation ( 'ProductVariant' );
		$model->populateRelation ( 'SProductImages' );
		$model->populateRelation ( 'Brand' );
		$model->populateRelation ( 'SProductPropertiesData' );
		return $model;
	}
	
	/**
	 * Load all shop products
	 * 
	 * @param SProductsQuery $model        	
	 */
	public function loadProductsByIds($ids) {
		$model = SProductsQuery::create ()->joinWithI18n ( $this->language )->leftJoinProductVariant ()->leftJoinSProductImages ()->leftJoinBrand ()->leftJoinSProductPropertiesData ()->orderByCategoryId ()->distinct ()->findById ( $ids );
		$model->populateRelation ( 'ProductVariant' );
		$model->populateRelation ( 'SProductImages' );
		$model->populateRelation ( 'Brand' );
		$model->populateRelation ( 'SProductPropertiesData' );
		return $model;
	}
	public function processCategoryName($id) {
		$result = array ();
		$category = $this->tree [$id];
		$idsPath = unserialize ( $category->getFullPathIds () );
		if ($idsPath === false)
			$idsPath = array ();
		array_push ( $idsPath, $id );
		foreach ( $idsPath as $categoryId )
			$result [] = preg_replace ( '/\//', '\/', $this->tree [$categoryId]->getName () );
		return implode ( '/', $result );
	}
	
	/**
	 * Load custom fields.
	 * 
	 * @access public
	 */
	public function prepareCustomFields() {
		$fields = SPropertiesQuery::create ()->find ();
		if (sizeof ( $fields ) > 0)
			foreach ( $fields as $f )
				$this->customFieldsCache [$f->getCsvName ()] = $f;
	}
	protected function columnsToAttributes() {
		$abbreviations = array (
				'name' => 'Name',
				'url' => 'Url',
				'oldprc' => 'OldPrice',
				'prc' => 'PriceInMain',
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
				
				// 'mimg' => 'mainImage',
				'vimg' => 'mainImage',
				
				// 'vsimg' => 'smallImage',
				'cur' => 'currency',
				
				// 'simg' => 'SmallImage',
				'imgs' => 'AdditionalImages',
				'shdesc' => 'ShortDescription',
				'desc' => 'FullDescription',
				'mett' => 'MetaTitle',
				'metd' => 'MetaDescription',
				'metk' => 'MetaKeywords',
				'skip' => 'skip' 
		);
		if (sizeof ( $this->customFieldsCache ) > 0)
			foreach ( $this->customFieldsCache as $key => $val )
				$abbreviations [$key] = $key;
		
		if (count ( $this->attributesCF )) {
			$attr = array_merge ( $this->attributes, $this->attributesCF );
		} else
			$attr = $this->attributes;
		$attributes = str_replace ( array_keys ( $abbreviations ), $abbreviations, implode ( ',', array_keys ( $attr ) ) );
		$attributes = array_map ( 'trim', explode ( ',', $attributes ) );
		foreach ( $attributes as $key => $val )
			if (! in_array ( $val, $abbreviations ))
				die ( 'Unknown column: ' . $val );
		$this->attributes = $attributes;
		return true;
	}
	
	/**
	 * addError
	 *
	 * @param mixed $msg        	
	 * @access protected
	 * @return void
	 */
	protected function addError($msg) {
		$this->errors [] = $msg;
	}
	
	/**
	 * Check for errors
	 *
	 * @access public
	 * @return boolean
	 */
	public function hasErrors() {
		if (sizeof ( $this->errors ) > 0)
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
