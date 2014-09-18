<?php /*
/**
* @main.tpl - template for displaying shop main page
* Variables
*   $site_title: variable for insert site title
*   $canonical: variable for insert canonical
*   $site_description: variable for insert site description
*   $THEME: variable for template path
*   $site_keywords : variable for insert site keywords
*   $content : variable for insert content of page
*/?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php if(isset($site_title)){ echo $site_title; } ?></title>
		<meta name="description" content="<?php if(isset($site_description)){ echo $site_description; } ?>" />
		<meta name="keywords" content="<?php if(isset($site_keywords)){ echo $site_keywords; } ?>" />
		<meta name="generator" content="ImageCMS" />
		<meta name = "format-detection" content = "telephone=no" />
		<link rel="stylesheet" type="text/css" href="<?php if(isset($THEME)){ echo $THEME; } ?>css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php if(isset($THEME)){ echo $THEME; } ?><?php if(isset($colorScheme)){ echo $colorScheme; } ?>/colorscheme.css" media="all" />

		<?php if($CI->uri->segment(1) == MY_Controller::getCurrentLocale()): ?>
			<?php $lang = '/' . \MY_Controller::getCurrentLocale()?> 
		<?php else:?>
			<?php $lang = ''?> 
		<?php endif; ?>
		<script type="text/javascript">
			var locale = "<?php echo $lang?>";
		</script>
		<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>js/jquery-1.8.3.min.js"></script>
		<?php $this->include_tpl('config.js', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
			<script type="text/javascript">
				$.ajaxSetup({
				cache: false
				});
				function initDownloadScripts(scripts, callback, customEvent) {
				function downloadJSAtOnload(scripts, callback, customEvent) {
				var cL = 0,
				scriptsL = scripts.length;

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
		
		<!--[if lte IE 9]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="<?php if(isset($THEME)){ echo $THEME; } ?>css/lte_ie_8.css" /><![endif]-->
		<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" href="<?php if(isset($THEME)){ echo $THEME; } ?>css/ie_7.css" />
			<script src="<?php if(isset($THEME)){ echo $THEME; } ?>js/localStorageJSON.js"></script>
		<![endif]-->

		<link rel="icon" href="<?php echo siteinfo('siteinfo_favicon_url')?>" type="image/x-icon" />
		<link rel="shortcut icon" href="<?php echo siteinfo('siteinfo_favicon_url')?>" type="image/x-icon" />
	</head>
	<body class="is<?php echo $agent[0]?> not-js"> 
		<?php $this->include_tpl('language/jsLangsDefine.tpl', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
		<?php $this->include_tpl('language/jsLangs.tpl', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
		<div class="main-body">
			<div class="wrap-phone-header <?php if($CI->uri->uri_string() == ''): ?>main-wrap-phone-header<?php endif; ?>">
				<div class="fon-header">
					<header>
						<?php $this->include_tpl('header', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
					</header>
					<?php if($CI->uri->uri_string() == ''): ?>
						<?php $CI->load->module('banners')->render()?>
					<?php endif; ?>
				</div>
			</div>
			<div class="content">
				<?php if(isset($content)){ echo $content; } ?>
			</div>
			<div class="h-footer"></div>
		</div>
		<footer>
			<?php $this->include_tpl('footer', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
		</footer>
		<?php $this->include_tpl('user_toolbar', '/var/www/avto-era.com.ua/templates/newLevel'); ?>

		<!-- scripts -->
		<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>js/_united_side_plugins.js"></script>
		<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>js/_plugins.js"></script>
		<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>js/_shop.js"></script>
		<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>js/_global_vars_objects.js"></script>
		<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>js/_functions.js"></script>
		<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>js/_scripts.js"></script>
		<script type="text/javascript">
			initDownloadScripts(['raphael-min', 'united_scripts'], 'init', 'scriptDefer');
		</script>
		
		<?php $this->include_shop_tpl('js_templates', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
		<!-- scripts end -->

		  <!-- GA -->
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
		

		<?php if($CI->session->flashdata('makeOrder') === true): ?>

			<script type="text/javascript">
				_gaq.push(['_addTrans',
					'<?php echo $model->id?>',
					'',
					'<?php echo $model->getTotalPrice()?>',
					'',
					'<?php echo $model->getSDeliveryMethods()->name?>',
					'',
					'',
					''
				]);

				<?php if(is_true_array($model->getSOrderProductss())){ foreach ($model->getSOrderProductss() as $item){ ?>
					<?php $total = $total + $item->getQuantity() * $item->toCurrency()?>
					<?php $product = $item->getSProducts()?>

				_gaq.push(['_addItem',
					'<?php echo $model->id?>',
					'<?php echo $product->getUrl()?>',
					'<?php echo encode(ShopCore::encode($product->getName()))?> <?php echo encode($item->getVariantName())?>',
					'<?php echo encode($product->getMainCategory()->name)?>',
					'<?php echo $item->toCurrency()?>',
						'<?php echo $item->getQuantity()?>'
					]);

				<?php }} ?>
					_gaq.push(['_trackTrans']);
			</script>

		<?php endif; ?>
			<script type="text/javascript">
				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
		


		<!-- /GA -->

		<!-- Yandex.Metrika counter -->
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
			<noscript><div><img src="//mc.yandex.ru/watch/23653594" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		
		<!-- /Yandex.Metrika counter -->
		
		<!-- Код тега ремаркетинга Google -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 973101105;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/973101105/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

	</body>
</html><?php $mabilis_ttl=1411131283; $mabilis_last_modified=1403818540; ///var/www/avto-era.com.ua/templates/newLevel/main.tpl ?>