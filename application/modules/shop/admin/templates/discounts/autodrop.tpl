{literal}
<style type=text/css>
.finder {
	position: absolute;
	z-index: 500;
	height: 200px;
	overflow: auto
}

ul.auto_search {
	background: white;
	list-style: none;
}

ul.auto_search li {
	cursor: pointer;
	padding: 5px;
}

ul.auto_search li:hover {
	background: #C0C0C0
}
</style>
{/literal}
<div class="finder">
	<ul class="auto_search">
		{foreach $products as $p}
		<li data-id="{echo $p->getid()}" data-url="{echo $p->geturl()}">{echo
			$p->getname()}</li> {/foreach}
	</ul>
</div>


