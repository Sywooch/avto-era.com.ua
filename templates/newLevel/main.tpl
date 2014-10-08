{/* /** * @main.tpl - template for displaying shop main page * Variables
* $site_title: variable for insert site title * $canonical: variable for
insert canonical * $site_description: variable for insert site
description * $THEME: variable for template path * $site_keywords :
variable for insert site keywords * $content : variable for insert
content of page */}
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>{$site_title}</title>
<meta name="description" content="{$site_description}" />
<meta name="keywords" content="{$site_keywords}" />
<meta name="generator" content="ImageCMS" />
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" type="text/css" href="{$THEME}css/style.css"
	media="all" />
<link rel="stylesheet" type="text/css"
	href="{$THEME}{$colorScheme}/colorscheme.css" media="all" />
	<link media="all" href="{$THEME}css/jquery-ui.1.8.23.css" type="text/css" rel="stylesheet">
	<link media="all" href="{$THEME}css/elasticsearch.css" type="text/css" rel="stylesheet">

{if $CI->uri->segment(1) == MY_Controller::getCurrentLocale()} {$lang =
'/' . \MY_Controller::getCurrentLocale()} {else:} {$lang = ''} {/if}
<script type="text/javascript">
			var locale = "{echo $lang}";
		</script>
<script type="text/javascript" src="{$THEME}js/jquery-1.8.3.min.js"></script>
		{include_tpl('config.js')}
		{literal}
			<script type="text/javascript">
				$.ajaxSetup({
					cache: false
				});
				function initDownloadScripts(scripts, callback, customEvent) {
					function downloadJSAtOnload(scripts, callback, customEvent) {
						var cL = 0,
						scriptsL = scripts.length;
						var theme = "/templates/newLevel/";
						$.map(scripts, function(i, n) {
							$.getScript(theme + 'js/' + i + '.js', function() {
								cL++;
								if (cL == scriptsL) {
									if (callback){
										eval(callback)();
										$(document).trigger({'type': customEvent});
									}
								}
							});
						})
					}
					// Check for browser support of event handling capability
					if (window.addEventListener)
					window.addEventListener("load", downloadJSAtOnload(scripts, callback, customEvent), false);
					else if (window.attachEvent)
					window.attachEvent("onload", downloadJSAtOnload(scripts, callback, customEvent));
					else
					window.onload = downloadJSAtOnload(scripts, callback, customEvent);
				}
			</script>
		{/literal}
<script src="{$THEME}js/jquery-ui.1.8.23.min.js" type="text/javascript">
<!--[if lte IE 9]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="{$THEME}css/lte_ie_8.css" /><![endif]-->
<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" href="{$THEME}css/ie_7.css" />
			<script src="{$THEME}js/localStorageJSON.js"></script>
		<![endif]-->

<link rel="icon" href="{echo siteinfo('siteinfo_favicon_url')}"
	type="image/x-icon" />
<link rel="shortcut icon" href="{echo siteinfo('siteinfo_favicon_url')}"
	type="image/x-icon" />
</head>
<body class="is{echo $agent[0]} not-js">
	{include_tpl('language/jsLangsDefine.tpl')}
	{include_tpl('language/jsLangs.tpl')}
	<div class="main-body">
		<div
			class="wrap-phone-header {if  $CI->uri->uri_string() == ''}main-wrap-phone-header{/if}">
			<div class="fon-header">
				<header> {include_tpl('header')} </header>				
				{if $CI->uri->uri_string() == ''}
				{$CI->load->module('banners')->render()} {/if}
			</div>
		</div>
		{include_tpl('elasticsearch.tpl')}
		<div class="content">{$content}</div>
		<div class="h-footer"></div>
	</div>
	<footer> {include_tpl('footer')} </footer>
	{include_tpl('user_toolbar')}

	<!-- scripts -->
	<script type="text/javascript" src="{$THEME}js/_united_side_plugins.js"></script>
	<script type="text/javascript" src="{$THEME}js/_plugins.js"></script>
	<script type="text/javascript" src="{$THEME}js/_shop.js"></script>
	<script type="text/javascript" src="{$THEME}js/_global_vars_objects.js"></script>
	<script type="text/javascript" src="{$THEME}js/_functions.js"></script>
	<script type="text/javascript" src="{$THEME}js/_scripts.js"></script>
	<script type="text/javascript">
			initDownloadScripts(['raphael-min', 'united_scripts'], 'init', 'scriptDefer');
		</script>

	{include_shop_tpl('js_templates')}
	<!-- scripts end -->

	<!-- GA -->

	{literal}
	<script type="text/javascript">
				var _gaq = _gaq || [];
						  _gaq.push(['_setAccount', 'UA-47226843-1']);
							  _gaq.push (['_addOrganic', 'images.yandex.ru', 'text']);
							  _gaq.push (['_addOrganic', 'blogs.yandex.ru', 'text']);
							  _gaq.push (['_addOrganic', 'video.yandex.ru', 'text']);
							  _gaq.push (['_addOrganic', 'meta.ua', 'q']);
							  _gaq.push (['_addOrganic', 'search.bigmir.net', 'z']);
							  _gaq.push (['_addOrganic', 'search.i.ua', 'q']);
							  _gaq.push (['_addOrganic', 'mail.ru', 'q']);
							  _gaq.push (['_addOrganic', 'go.mail.ru', 'q']);
							  _gaq.push (['_addOrganic', 'google.com.ua', 'q']);
							  _gaq.push (['_addOrganic', 'images.google.com.ua', 'q']);
							  _gaq.push (['_addOrganic', 'maps.google.com.ua', 'q']);
							  _gaq.push (['_addOrganic', 'images.google.ru', 'q']);
							  _gaq.push (['_addOrganic', 'maps.google.ru', 'q']);
							  _gaq.push (['_addOrganic', 'rambler.ru', 'words']);
							  _gaq.push (['_addOrganic', 'nova.rambler.ru', 'query']);
							  _gaq.push (['_addOrganic', 'nova.rambler.ru', 'words']);
							  _gaq.push (['_addOrganic', 'gogo.ru', 'q']);
							  _gaq.push (['_addOrganic', 'nigma.ru', 's']);
							  _gaq.push (['_addOrganic', 'poisk.ru', 'text']);
							  _gaq.push (['_addOrganic', 'go.km.ru', 'sq']);
							  _gaq.push (['_addOrganic', 'liveinternet.ru', 'ask']);
							  _gaq.push (['_addOrganic', 'gde.ru', 'keywords']);
							  _gaq.push (['_addOrganic', 'search.qip.ru', 'query']);
							  _gaq.push (['_addOrganic', 'webalta.ru', 'q']);
							  _gaq.push (['_addOrganic', 'sm.aport.ru', 'r']);
							  _gaq.push (['_addOrganic', 'index.online.ua', 'q']);
							  _gaq.push (['_addOrganic', 'web20.a.ua', 'query']);
							  _gaq.push (['_addOrganic', 'search.ukr.net', 'search_query']);
							  _gaq.push (['_addOrganic', 'search.com.ua', 'q']);
							  _gaq.push (['_addOrganic', 'search.ua', 'q']);
							  _gaq.push (['_addOrganic', 'affiliates.quintura.com', 'request']);
							  _gaq.push (['_addOrganic', 'akavita.by', 'z']);
							  _gaq.push (['_addOrganic', 'search.tut.by', 'query']);
							  _gaq.push (['_addOrganic', 'all.by', 'query']);
				  _gaq.push(['_trackPageview']);
			</script>
	{/literal} {if $CI->session->flashdata('makeOrder') === true}

	<script type="text/javascript">
				_gaq.push(['_addTrans',
					'{echo $model->id}',
					'',
					'{echo $model->getTotalPrice()}',
					'',
					'{echo $model->getSDeliveryMethods()->name}',
					'',
					'',
					''
				]);

				{foreach $model->getSOrderProductss() as $item}
					{$total = $total + $item->getQuantity() * $item->toCurrency()}
					{$product = $item->getSProducts()}

				_gaq.push(['_addItem',
					'{echo $model->id}',
					'{echo $product->getUrl()}',
					'{echo encode(ShopCore::encode($product->getName()))} {echo encode($item->getVariantName())}',
					'{echo encode($product->getMainCategory()->name)}',
					'{echo $item->toCurrency()}',
						'{echo $item->getQuantity()}'
					]);

				{/foreach}
					_gaq.push(['_trackTrans']);
			</script>

	{/if} {literal}
	<script type="text/javascript">
				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
	{/literal}


	<!-- /GA -->

	<!-- Yandex.Metrika counter -->
	{literal}
	<script type="text/javascript">
			(function (d, w, c) {
				(w[c] = w[c] || []).push(function() {
					try {
						w.yaCounter23653594 = new Ya.Metrika({id:23653594,
								webvisor:true,
								clickmap:true,
								trackLinks:true,
								accurateTrackBounce:true});
					} catch(e) { }
				});

				var n = d.getElementsByTagName("script")[0],
					s = d.createElement("script"),
					f = function () { n.parentNode.insertBefore(s, n); };
				s.type = "text/javascript";
				s.async = true;
				s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

				if (w.opera == "[object Opera]") {
					d.addEventListener("DOMContentLoaded", f, false);
				} else { f(); }
			})(document, window, "yandex_metrika_callbacks");
			</script>
	<noscript>
		<div>
			<img src="//mc.yandex.ru/watch/23653594"
				style="position: absolute; left: -9999px;" alt="" />
		</div>
	</noscript>
	{/literal}
	<!-- /Yandex.Metrika counter -->

	<!-- Код тега ремаркетинга Google -->
	<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 973101105;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
	<script type="text/javascript"
		src="//www.googleadservices.com/pagead/conversion.js">
</script>
	<noscript>
		<div style="display: inline;">
			<img height="1" width="1" style="border-style: none;" alt=""
				src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/973101105/?value=0&amp;guid=ON&amp;script=0" />
		</div>
	</noscript>

</body>
</html>