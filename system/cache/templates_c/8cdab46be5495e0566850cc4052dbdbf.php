<!-- php vars to js -->
<?php if($is_logged_in == '1'): ?>
    <?php $is_logged_in = 1?>
    <?php $wish_list = $CI->load->module('wishlist')?>
    <?php $countWL = $wish_list->getUserWishListItemsCount($CI->dx_auth->get_user_id())?>
<?php else:?>
    <?php $is_logged_in = 0?>
    <?php $countWL = 0?>
<?php endif; ?>
<?php $countSh = getProductViewsCount()?>
<script type="text/javascript">
    var genObj = {
    popupCart: '#popupCart',
    pageCart: '.page-cart',
    pM: '.paymentMethod',
    trCartKit: 'tr.row-kits',
    frameCount: '.frame-count', //селектор
    countOrCompl: '.countOrCompl', //селектор
    priceOrder: '[data-rel="priceOrder"]',
    priceAddOrder: '[data-rel="priceAddOrder"]',
    priceOrigOrder: '[data-rel="priceOrigOrder"]',
    minus: '.btn-minus > button',
    plus: '.btn-plus > button',
    parentBtnBuy: 'li, .item-product', //селектор
    compareIn: 'btn-comp-in', //назва класу
    wishIn: 'btn-wish-in', //назва класу
    btnWish: '.btn-wish',
    toWishlist: 'toWishlist', //назва класу
    inWishlist: 'inWishlist', //назва класу
    tinyWishList: '.tiny-wish-list',
    countTinyWishList: '.wishListCount',
    tinyCompareList: '.tiny-compare-list',
    countTinyCompareList: '.compareListCount',
    toCompare: 'toCompare', //назва класу
    inCompare: 'inCompare', //назва класу
    plurProd: '.plurProd',
    countBask: '.topCartCount',
    sumBask: '.topCartTotalPrice',
    addSumBask: '.topCartTotalAddPrice',
    tinyBask: '.tiny-bask', //селектор
    bask: '.bask', //селектор
    blockEmpty: '.empty',
    blockNoEmpty: '.no-empty',
    isAvail: 'pointer', //назва класу
    loginButton: '#loginButton', //селектор
    inCart: 'in-cart', //назва класу
    toCart: 'to-cart', //назва класу
    notAvail: 'not-avail', //назва класу
    infoBut: '.infoBut',
    btnBuy: '.btnBuy', //назва класу кнопка купити
    btnBuyCss: 'btn-buy', //назва класу
    btnCartCss: 'btn-cart', //назва класу
    frameNumber: '.frame-variant-code',
    frameVName: '.frame-variant-name',
    code: '.code',
    prefV: ".variant_",
    selVariant: '.variant',
    imgVC: '.vimg',
    imgVP: '.vimgPr',
    priceVariant: '.priceVariant',
    priceOrigVariant: '.priceOrigVariant',
    priceAddPrice: '.addCurrPrice',
    photoProduct: '#photoProduct',
        mainThumb: '#mainThumb',
    plusMinus: '[data-rel="plusminus"]',
    frameBasks: '.frame-bask', //order and popup
    frameChangeCount: '.frame-change-count',
    numberC: '.number', //количество на складе
    frameDiscount: '#discount',
    gift: '#gift',
    genDiscount: '.genDiscount',
    genSumDiscount: '.genSumDiscount',
    frameCurDiscount: '.frame-discount',
    frameGenDiscount: '.frame-gen-discount',
    shipping: 'span#shipping',
    finalAmountAdd: 'span#finalAmountAdd',
    finalAmount: 'span#finalAmount',
    totalPrice: 'span#totalPrice',
    showCart: '#showCart',
    certPrice: '#giftCertPrice',
    certFrame: '#giftCertSpan',
    orderDetails: '#orderDetails',
    orderDetailsTemplate: '#orderDetailsTemplate',
    textEl: '.text-el', //селектор
    msgF: '.msg',
    err: 'error', //клас
    scs: 'success', //клас
    info: 'info' //клас
};
    
    <?php if($comp = $CI->session->userdata('shopForCompare')): ?>
        <?php $cnt_comp = count($comp)?>
    <?php else:?>
        <?php $cnt_comp = 0?>
    <?php endif; ?>
        var curr = '<?php if(isset($CS)){ echo $CS; } ?>',
        nextCs = '<?php echo $NextCS?>',
        discountInPopup = true,
        pricePrecision = parseInt('<?php echo ShopCore::app()->SSettings->pricePrecision?>'),
        checkProdStock = "<?php echo ShopCore::app()->SSettings->ordersCheckStocks?>", //use in plugin plus minus
        inServerCart = parseInt("<?php echo ShopCore::app()->SCart->totalItems()?>"),
        inServerCompare = parseInt("<?php if(isset($cnt_comp)){ echo $cnt_comp; } ?>"),
        inServerWishList = parseInt("<?php if(isset($countWL)){ echo $countWL; } ?>"),
        countViewProd = parseInt("<?php if(isset($countSh)){ echo $countSh; } ?>"),
        theme = "<?php if(isset($THEME)){ echo $THEME; } ?>",
        siteUrl = "<?php echo site_url()?>",
        colorScheme = "<?php if(isset($colorScheme)){ echo $colorScheme; } ?>",
        inCart = '<?php echo lang ('В корзине','newLevel'); ?>',
        toCart = '<?php echo lang ('В корзину','newLevel'); ?>',
        pcs = '<?php echo lang ('Количество:'); ?>',
        kits = '<?php echo lang ('Комплектов:'); ?>',
        captchaText = '<?php echo lang ('Код протекции'); ?>',
        isLogin = "<?php if(isset($is_logged_in)){ echo $is_logged_in; } ?>" == '1' ? true : false,
        plurProd = ['<?php echo lang ("товар","newLevel"); ?>', '<?php echo lang ("товара","newLevel"); ?>', '<?php echo lang ("товаров","newLevel"); ?>'],
        plurKits = ['<?php echo lang ("набор","newLevel"); ?>', '<?php echo lang ("набора","newLevel"); ?>', '<?php echo lang ("наборов","newLevel"); ?>'],
        plurComments = ['<?php echo lang ("отзыв","newLevel"); ?>', '<?php echo lang ("отзыва","newLevel"); ?>', '<?php echo lang ("отзывов","newLevel"); ?>'],
        
        selectDeliv = false,
        selectPayment = false,
        selIcons = '[class*=icon_]',
        preloader = '.preloader',
        selScrollPane = '.frame-scroll-pane .content-carousel';
        text = {
            search: function(text) {
                return '<?php echo lang ("Введите боллее", "newLevel"); ?>' + ' ' + text + ' <?php echo lang ("символов", "newLevel"); ?>';
            },
            error: {
                notLogin: '<?php echo lang ("В список желаний могут добавлять только авторизированные пользователи", "newLevel"); ?>',
                fewsize: function(text) {
                    return '<?php echo lang ("Выберете размер меньше или равно", "newLevel"); ?>' + ' ' + text + ' <?php echo lang ("пикселей", "newLevel"); ?>';
                },
                enterName: '<?php echo lang ("Введите название", "newLevel"); ?>'
            }
        }
    
</script><?php $mabilis_ttl=1411133400; $mabilis_last_modified=1403818539; ///var/www/avto-era.com.ua/templates/newLevel/config.js.tpl ?>