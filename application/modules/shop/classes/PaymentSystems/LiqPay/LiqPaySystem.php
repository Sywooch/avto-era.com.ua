<?php

/**
 * Robokassa payment module
 *
 * author: dev@imagecms.net
 * more info at: http://www.robokassa.ru/HowTo.aspx
 */
class LiqPaySystem extends BasePaymentProcessor {

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


        if (empty($_POST['operation_xml']) && empty($_POST['signature '])) {
            $this->setOrderPaid();
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
        $merchant_id = $data['merchant_id'];
        $merchant_sig = $data['merchant_sig'];
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


        // формирование подписи
        $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_orderKey=$shp_order_key:Shp_pmId=$shp_payment_id");


        // форма оплаты товара
        $xml = "<request>
		<version>1.2</version>
		<result_url>" . shop_url('cart/view/?result=true&amp;pm=' . $this->paymentMethod->getId()) . "</result_url>
		<server_url>" . shop_url('cart/view/?result=true&amp;pm=' . $this->paymentMethod->getId()) . "</server_url>
		<merchant_id>$merchant_id</merchant_id>
		<order_id>$inv_id</order_id>
		<amount>$out_summ</amount>
		<currency>$ISOCode</currency>
		<description>$inv_desc</description>
		<pay_way>card</pay_way>
		</request>";

        $xml_encoded = base64_encode($xml);
        $lqsignature = base64_encode(sha1($merchant_sig . $xml . $merchant_sig, 1));


        $this->render('LiqPay', array(
            'xml_encoded' => $xml_encoded,
            'lqsignature' => $lqsignature
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
                <label class="control-label" for="inputRecCount">' . lang('Merchant id', 'main') . ':</label>
                <div class="controls">
                 <input type="text" name="LiqPay[merchant_id]" value="' . $data['merchant_id'] . '"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputRecCount">' . lang('Signature', 'main') . ':</label>
                <div class="controls">
                 <input type="text" name="LiqPay[merchant_sig]" value="' . $data['merchant_sig'] . '" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputRecCount">' . lang('Merchant settings', 'main') . ':</label>
                <div class="controls">
                Result URL: ' . shop_url('cart/view/?result=true&pm=' . $this->paymentMethod->getId()) . '<br/>
                Server URL: ' . shop_url('cart/view/?result=true&pm=' . $this->paymentMethod->getId()) . '<br/>
                ' . lang('The method of sending data for all requests: GET', 'main') . '
                </div>
            </div>
        ';

        return $form;
    }

    /**
     * Save settings
     *
     * @return bool|string
     */
    public function saveSettings(SPaymentMethods $paymentMethod) {
        $saveKey = $paymentMethod->getId() . '_LiqPayData';
        ShopCore::app()->SSettings->set($saveKey, serialize($_POST['LiqPay']));

        return true;
    }

    /**
     * Load Robokassa settings
     *
     * @return array
     */
    protected function loadSettings() {
        $settingsKey = $this->paymentMethod->getId() . '_LiqPayData';
        $data = unserialize(ShopCore::app()->SSettings->$settingsKey);
        if ($data === false)
            $data = array();
        return array_map('encode', $data);
    }

}