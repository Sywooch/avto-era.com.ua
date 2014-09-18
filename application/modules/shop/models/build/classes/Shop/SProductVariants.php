<?php

/**
 * Skeleton subclass for representing a row from the 'shop_product_variants' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SProductVariants extends BaseSProductVariants {

    static $oldprice = 0;
    private $imageVariants = array();
    private $uploadProductsPath;

    public function __construct() {
        //Upload images path
        $this->uploadProductsPath = media_url() . 'uploads/shop/products/';
        //Image variants names
        $this->imageVariants = \MediaManager\Image::create()->getImageVarintsNames();
    }

    /**
      public function hydrate($row, $startcol = 0, $rehydrate = false)
      {
      parent::hydrate($row, $startcol, $rehydrate);
      }
     * */
    public function preDelete() {
        // Delete images
        if (file_exists(ShopCore::$imagesUploadPath . $this->getMainimage()))
            @unlink(ShopCore::$imagesUploadPath . $this->getMainimage());

        if (file_exists(ShopCore::$imagesUploadPath . $this->getSmallimage()))
            @unlink(ShopCore::$imagesUploadPath . $this->getSmallimage());

        return true;
    }

    public function getPrice() {
        return round(parent::getPrice(), ShopCore::app()->SSettings->pricePrecision);
    }

    public function getPriceWithDiscount() {
        $pr_one = parent::getPrice();
        $pr_two = parent::getPrice();
        $discountInt = ShopCore::app()->SDiscountsManager->discount();
        $pr_three = $pr_one - $pr_two / 100 * (int) $discountInt;

        return round($pr_three, ShopCore::app()->SSettings->pricePrecision);
    }

    /**
     * Populates the translatable object using an array.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return     void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME, $loc = null) {
        $peerName = get_class($this) . I18nPeer;
        $keys = $peerName::getFieldNames($keyType);

        if (array_key_exists('Locale', $arr)) {
            $this->setLocale($arr['Locale']);
            unset($arr['Locale']);
        } else {
            $defaultLanguage = getDefaultLanguage();
            $this->setLocale($defaultLanguage['identif']);
        }

        foreach ($keys as $key)
            if (array_key_exists($key, $arr)) {

                if ($loc) {

                    if ($key != 'Name') {
                        $methodName = set . $key;
                        $this->$methodName($arr[$key]);
                    }
                } else {
                    $methodName = set . $key;
                    $this->$methodName($arr[$key]);
                }
            }

        parent::fromArray($arr, $keyType);
    }

    public function getTranslatableFieldNames($keyType = BasePeer::TYPE_PHPNAME) {
        $peerName = get_class($this) . I18nPeer;
        $keys = $peerName::getFieldNames($keyType);
        $keys = array_flip($keys);

        if (array_key_exists('Locale', $keys)) {
            unset($keys['Locale']);
        }

        if (array_key_exists('Id', $keys)) {
            unset($keys['Id']);
        }

        return array_flip($keys);
    }

    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false) {
        $result = parent::toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, $includeForeignObjects);

        $translatableFieldNames = $this->getTranslatableFieldNames();
        foreach ($translatableFieldNames as $fieldName) {
            $methodName = 'get' . $fieldName;
            $result[$fieldName] = $this->$methodName();
        }

        return $result;
    }

    public function postUpdate() {

    }

    //extended parent function and sets oldprice in products table when first variant price is changed

    public function setPrice($v, $currencyid = null) {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ((double) $this->price !== $v) {
            if ($currencyid) {
                $v = ShopCore::app()->SCurrencyHelper->toMain($v, $currencyid);
            }
            if ($this->position == 0) {
                $productModel = SProductsQuery::create()->findPk($this->getProductId());
                if (count($productModel) > 0) {
                    //echo $v;
//                    $productModel->setOldPrice((int) $v);
                    $productModel->save();
                }
            }
            $this->price = $v;
            $this->modifiedColumns[] = SProductVariantsPeer::PRICE;
        }
        return $this;
    }

    public function __call($name, $params = array()) {

        $method = strtolower(substr($name, 3, -5));
        $prefix = strtolower(substr($name, -5));

        if (in_array($method, $this->imageVariants) && $prefix == 'photo')
            if ($this->getMainimage() != null)
                return $this->uploadProductsPath . $method . '/' . $this->getMainimage();
            else
                return $this->uploadProductsPath . '../nophoto/nophoto.jpg';
    }

}

// SProductVariants
