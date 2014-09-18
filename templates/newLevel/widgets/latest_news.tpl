{if count($recent_news) > 0}
    <div class="frame-news">
        <div class="container">
            <div class="frame-title">
                <div class="title-h1 d_i title"><a href="{site_url('novosti')}">{lang('Новости','newLevel')}</a></div>
            </div>
            <ul class="items items-news">
                {foreach $recent_news as $item}
                    {$item = $CI->load->module('cfcm')->connect_fields($item, 'page')}
                    <li>
                        <a href="{site_url($item.full_url)}" class="frame-photo-title">
                            {if trim($item.field_image) != ""}
                                <span class="photo-block">
                                    <span class="helper"></span>
                                    <img src="{$item.field_image}" alt="" />
                                </span>
                            {/if}
                            <span class="title">{$item.title}</span>
                        </a>
                        <div class="description">
                            {$item.prev_text}
                            {if trim($item.field_info) != ""}
                                <div class="info">{$item.field_info}</div>
                            {/if}
                            <div class="btn-read_more">
                                <button type="button" onclick="location = '{site_url($item.full_url)}'">
                                    <span class="text-el">Подробнее</span><span class="icon_read_more"></span>
                                </button>
                            </div>
                        </div>
                        {/*}
                        <div class="date f-s_0">
                            <span class="icon_time"></span><span class="text-el"></span>
                            <span class="day">{echo date("d", $item.publish_date)} </span>
                            <span class="month">{echo month(date("n", $item.publish_date))} </span>
                            <span class="year">{echo date("Y ", $item.publish_date)}</span>
                        </div>
                        { */}
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>
{/if}