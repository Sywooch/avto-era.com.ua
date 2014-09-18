<!--Start. Top menu and authentication data block-->
<div class="menu-header">
    <div class="container">
        <nav class="left-header f_l">
            <ul class="nav">
                {load_menu('top_menu')}
            </ul>
        </nav>
        <div class="frame-search-form d_i-b">
                    <div class="p_r">
                        <form name="search" method="get" action="{shop_url('search')}">
                            <span class="btn-search">
                                <button type="submit"><span class="icon_search"></span><span class="text-el">{lang('Найти','newLevel')}</span></button>
                            </span>
                            <div class="frame-search-input">
                                <input type="text" class="input-search" id="inputString" name="text" autocomplete="off" value="{if strpos($CI->uri->uri_string, 'search') !== false}{htmlspecialchars($_GET['text'])}{/if}" />
                                <div id="suggestions" class="drop drop-search"></div>
                            </div>
                        </form>
                    </div>
                </div>
        <div class="right-header f_r">
            {include_shop_tpl('auth_data')}
        </div>
    </div>
</div>
<!--End. Top menu and authentication data block-->
<div class="content-header">
    <div class="container">
        <!--        Logo-->
        <div class="wrap-logo">
            {if  $CI->uri->uri_string() == ''}
                <span class="logo">
                    <img src="{echo siteinfo('siteinfo_logo_url')}" alt="logo.png"/>
                </span>
            {else:}
                <a href="{site_url('')}" class="logo">
                    <img src="{echo siteinfo('siteinfo_logo_url')}" alt="logo.png"/>
                </a>
            {/if}
        </div>
        <div class="left-content-header">
            <div class="header-left-content-header">
                <div class="del-info-header d_i-b">
                    <span class="icon-del-info-header"></span>
                    <span class="text-el c_23">Доставка по Украине</span>
                </div>
                <!--                Start. contacts block-->
                <div class="phones-header">
                    <span class="f-s_0">
                        <span class="icon_phone_header"></span>
                        <span class="phone">
                            <span class="phone-number">{echo siteinfo('siteinfo_mainphone')}</span>

                        </span>
                    </span>
                    <ul class="tabs">
                        <li class="btn-order-call">
                            <a href="#ordercall" data-drop="#ordercall" data-source="{site_url('shop/callback')}" class="pointer">
                                <span class="icon_order_call"></span>
                                <span class="text-el d_l_bl">{lang('Заказать звонок','newLevel')}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--                End. Contacts block-->
                <!--                Start. Include cart data template-->
                <div id="bask_block" class="frame-cleaner">
                    {include_shop_tpl('cart_data')}
                </div>
                <!--                    End. Include cart data template-->
            </div>
            <div class="frame-search-cleaner clearfix f_r">
                <!--                Start. Show search form-->
                
                <!--                End. Show search form-->
                <div class="frame-menu-main horizontal-menu f_l">
                    {\Category\RenderMenu::create()->setConfig(array('cache'=>TRUE))->load('category_menu')}
                </div>
            </div>
        </div>
    </div>
</div>
{if strpos($CI->uri->uri_string, 'search') !== false}
    {literal}
        <script>
            $(document).on('scriptDefer', function() {
                var input = $('#inputString');
                input.setCursorPosition(input.val().length);
            });
        </script>
    {/literal}
{/if}