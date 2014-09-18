<?php



/**
 * Skeleton subclass for representing a row from the 'shop_callbacks_statuses' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SCallbackStatuses extends BaseSCallbackStatuses {

	public function attributeLabels()
	{
		return array(
			'Text'=>ShopCore::t(lang('Name','admin')),
		);
	}

    public function rules()
    {
        return array(
           array(
                 'field'=>'Text',
                 'label'=>$this->getLabel('Text'),
                 'rules'=>'required'
              ),
        );
    }

    public function postSave()
    {
        if ($this->getIsDefault() == true)
        {
            // Only one status can be as default
            SCallbackStatusesQuery::create()
                ->where('SCallbackStatuses.Id !=?', $this->getPrimaryKey())
                ->update(array(
                    'IsDefault'=>false,
                ));
        }
        return true;
    }
	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME) 
	{
		$peerName = get_class($this).I18nPeer;
		$keys = $peerName::getFieldNames($keyType);

		if (array_key_exists('Locale', $arr)){
			$this->setLocale($arr['Locale']);
			unset($arr['Locale']);
		} else {
            $defaultLanguage = getDefaultLanguage();
            $this->setLocale($defaultLanguage['identif']);
        }

		foreach($keys as $key)
			if (array_key_exists($key, $arr)){
				$methodName = set.$key;
				$this->$methodName($arr[$key]);
			}
		
		parent::fromArray($arr, $keyType);
	}

} // SCallbackStatuses
