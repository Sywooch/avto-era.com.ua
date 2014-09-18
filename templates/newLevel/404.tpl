{$colorScheme = 'css/color_scheme_1'}
<div class="frame-inside page-404">
    <div class="container">
        <div class="content t-a_c">
            <img src="{$THEME}{$colorScheme}/images/404.png"/>
            <div class="description">
                {$error}            
                <div class="btn-buy-p">
                    <a href="{site_url()}"><span class="text-el">{lang('Перейти на главную','newLevel')}</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
{literal}
    <script>
        $(document).on('ready', function(){
            $('footer').css({'z-index': 1, 'position': 'relative'});
        });
    </script>
{/literal}