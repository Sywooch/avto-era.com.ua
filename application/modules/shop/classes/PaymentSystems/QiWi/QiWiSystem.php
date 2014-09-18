<?php

/**
 * Robokassa payment module
 *
 * author: dev@imagecms.net
 * more info at: http://www.robokassa.ru/HowTo.aspx
 */
class QiWiSystem extends BasePaymentProcessor {

    protected $settigns = null;

    public function __construct() {
        $this->order = ShopCore::app()->SPaymentSystems->getOrder();
        $lang = new MY_Lang();
        $lang->load('main');
    }

    /**
     * Process payment.
     */
    public function processPayment() {
        // Check if order is paid.
        if ($this->order->getPaid() == true)
            return ERROR_ORDER_PAID_BEFORE;

        $data = $this->loadSettings();
        $mrh_pass2 = $data['password2'];
        $shp_order_key = $this->order->getKey();
        $shp_payment_id = $this->paymentMethod->getId();

        $out_summ = $_REQUEST["OutSum"];
        $inv_id = $_REQUEST["InvId"];
        $crc = strtoupper($_REQUEST["SignatureValue"]);
        $my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_orderKey=$shp_order_key:Shp_pmId=$shp_payment_id"));

        // Check sum
        if ($out_summ != ShopCore::app()->SCurrencyHelper->convert($this->order->getTotalPrice(), $this->paymentMethod->getCurrencyId()))
            return ERROR_SUM;

        // Check sign
        if ($my_crc != $crc)
            return "bad sign $out_summ:$inv_id:Shp_orderKey=$shp_order_key:Shp_pmId=$shp_payment_id";

        // Set order paid
        $this->setOrderPaid();

        // Show answer for Robokassa API service
        if (isset($_REQUEST['getResult']) && $_REQUEST['getResult'] == 'true') {
            echo "OK" . $this->order->getId();
            exit();
        }

        return true;
    }

    /**
     * Create payment form
     *
     * @return string Generated form
     */
    public function getForm() {
        $data = $this->loadSettings();

        // Оплата заданной суммы с выбором валюты на сайте LiqPay
        // регистрационная информация (логин, пароль #1)
        $QiWiId = $data['QiWi'];
        $QiWiTime = $data['QiWiTime'];
        $shp_order_key = $this->order->getKey();
        $shp_payment_id = $this->paymentMethod->getId();

        // номер заказа
        $inv_id = $this->order->getId();

        // описание заказа
        $inv_desc = "Оплата заказа номер " . $this->order->getId();

        // сумма заказа
        //$out_summ = ShopCore::app()->SCurrencyHelper->convert($this->order->getTotalPrice(), $this->paymentMethod->getCurrencyId());

        $productsPrice = $this->order->getTotalPrice();
        // ціна доставки
        $deliveryPrice = $this->order->getDeliveryPrice();
        $out_summ = ShopCore::app()->SCurrencyHelper->convert($deliveryPrice + $productsPrice, $this->paymentMethod->getCurrencyId());

        // предлагаемая валюта платежа
        $ISOCode = SCurrenciesQuery::create()->filterByIsDefault(true)->findOne()->getCode();

        $out_summ = explode(".", $out_summ);
        // формирование подписи
        $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_orderKey=$shp_order_key:Shp_pmId=$shp_payment_id");

        $this->render('QIWI', array(
            'QiWiId' => $QiWiId,
            'QiWiTime' => $QiWiTime,
            'shp_order_key' => $shp_order_key,
            'shp_payment_id' => $shp_payment_id,
            'inv_id' => $inv_id,
            'inv_desc' => $inv_desc,
            'out_summ' => $out_summ,
            'ISOCode' => $ISOCode,
            'crc' => $crc
        ));
    }

    /**
     * Create configure form
     *
     * @return string
     */
    public function getAdminForm() {
        $data = $this->loadSettings();

        $form = '
            
            <div class="control-group">
                <label class="control-label" for="inputRecCount">' . lang('Account number', 'main') . ':</label>
                <div class="controls">
                 <input type="text" name="QiWi[QiWi]" value="' . $data['QiWi'] . '" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputRecCount">' . lang('The lifetime of the account', 'main') . ':</label>
                <div class="controls">
                 <input type="text" name="QiWi[QiWiTime]" value="' . $data['QiWiTime'] . '" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputRecCount">' . lang('Merchant settings', 'main') . ':</label>
                <div class="controls">
                Result URL: ' . shop_url('cart/view/?result=true&pm=' . $this->paymentMethod->getId()) . '<br/>
                Server URL: ' . shop_url('cart/view/?result=true&pm=' . $this->paymentMethod->getId()) . '<br/>
                <span class="help-block">' . lang('The method of sending data for all requests: GET', 'main') . '</span>
                </div>
            </div> ';

        return $form;
    }

    /**
     * Save settings
     *
     * @return bool|string
     */
    public function saveSettings(SPaymentMethods $paymentMethod) {
        $saveKey = $paymentMethod->getId() . '_QiWiData';
        ShopCore::app()->SSettings->set($saveKey, serialize($_POST['QiWi']));

        return true;
    }

    /**
     * Load Robokassa settings
     *
     * @return array
     */
    protected function loadSettings() {
        $settingsKey = $this->paymentMethod->getId() . '_QiWiData';
        $data = unserialize(ShopCore::app()->SSettings->$settingsKey);
        if ($data === false)
            $data = array();
        return array_map('encode', $data);
    }

}