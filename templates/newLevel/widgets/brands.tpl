{if count($brands) > 0}
    <div class="frame-brands">
        <div class="products-carousel">
            {/*carousel_js*/}
            <div class="frame-title container">
                <div class="title">
                    <a href="{shop_url('brand/')}">{$title}</a>
                </div>
            </div>
            <div class="container">
                <div class="frame-brands-carousel">
                    <div class="content-carousel">
                        <ul class="items items-brands">
                            {foreach $brands as $brand}
                                <li>
                                    <a href="{shop_url($brand.full_url)}" class="frame-photo-title">
                                        <span class="photo-block">
                                            <span class="helper"></span>
                                            <img data-original="{media_url($brand.img_fullpath)}" src="{$THEME}images/blank.gif" title="{$brand.name}" alt="{$brand.name}" class="lazy"/>
                                        </span>
                                    </a>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="group-button-carousel">
                <button type="button" class="prev arrow">
                    <span class="icon_arrow_p"></span>
                </button>
                <button type="button" class="next arrow">
                    <span class="icon_arrow_n"></span>
                </button>
            </div>
        </div>
    </div>
{/if}