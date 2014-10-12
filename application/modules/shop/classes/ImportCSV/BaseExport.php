<?php

namespace ImportCSV;

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @property Core $core
 * @property CI_DB_active_record $db
 */
class BaseExport extends \CI_Model {

	public $maxRowLength = 10000;
	public $delimiter = ";";
	public $enclosure = '"';
	public $content;
	public $currency = '';
	public $attributes = "";
	public $encoding = 'utf-8';
	public $languages = 'ru';
	public $import_type = "ProductsImport";
	public $customFieldsCache = array();
	public $exportSuccessfulHandler;
	public static $attributesAlias = array(
			'skip' => 'Пропустить колонку',
			'name' => 'Имя товара',
			'url' => 'URL',
			'prc' => 'Цена',
			'oldprc' => 'Старая Цена',
			'stk' => 'Количество',
			'num' => 'Артикул',
			'var' => 'Имя варианта',
			'act' => 'Активен',
			'hit' => 'Хит',
			'brd' => 'Бренд',
			'cat' => 'Категория',
			'relp' => 'Связанные товары',
			//        'mimg' => 'Основное изображение',
			'vimg' => 'Основное изображение варианта',
			//        'vsimg' => 'Маленькое изображение варианта',
			'cur' => 'Валюта',
			//        'simg' => 'Основное изображение дополнительное',
	//        'modim' => 'Маленькое изображение',
	//        'modis' => 'Маленькое изображение дополнительное',
			'imgs' => 'Дополнительные изображения',
			'shdesc' => 'Краткое описание',
			'desc' => 'Полное описание',
			'mett' => 'Meta Title',
			'metd' => 'Meta Description',
			'metk' => 'Meta Keywords');

	public function __construct($settings) {

	}

}