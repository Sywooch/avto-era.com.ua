<?php

/**
 * Skeleton subclass for representing a row from the 'shop_callbacks' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SCallbacks extends BaseSCallbacks {

    public function attributeLabels() {
        return array(
            'Name' => ShopCore::t('Имя'),
            'Phone' => ShopCore::t('Телефон'),
            'ThemeId' => ShopCore::t('Тема вопроса'),
            'Comment' => ShopCore::t('Дополнительная информация'),
        );
    }

    public function rules() {
        return array(
            array(
                'field' => 'Name',
                'label' => $this->getLabel('Name'),
                'rules' => 'required'
            ),
            array(
                'field' => 'Phone',
                'label' => $this->getLabel('Phone'),
                'rules' => 'required|trim|xss_clean|max_length[50]|numeric',
            ),
            array(
                'field' => 'ThemeId',
                'label' => $this->getLabel('ThemeId'),
                'rules' => 'trim',
            ),
//            array(
//                'field' => 'Comment',
//                'label' => $this->getLabel('Comment'),
//                'rules' => 'required',
//            ),
        );
    }

}

// SCallbacks
