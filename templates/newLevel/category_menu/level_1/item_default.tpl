<li class="column_{echo $CI->load->module('new_level')->getCategoryColumns($id)}">
    <a href="{$link}" class="title-category-l1 {if $wrapper != FALSE} is-sub{/if}">
        <span class="helper"></span>
        <span class="icon_{$image}"></span>
        <span class="text-el">{$title}</span>
    </a>
    {$wrapper}
</li>