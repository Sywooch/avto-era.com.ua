<table border="0" width="550" align="center">
	<tr>
		<td><font size="14px">{lang('Product order','admin')} №
				{echo $model->getId()} {$pageNumber}</font></td>
	</tr>
</table>

<table border="1" width="550" align="center">
	<tr>
		<td width="40">№</td>
		<td width="200">{lang('Product name','admin')}</td>
		<td width="50">{lang('Measurement unit','admin')}</td>
		<td width="65">{lang('Quantity','admin')}</td>
		<td width="100">{lang('Price','admin')}</td>
		<td width="100">{lang('Total price','admin')}</td>
	</tr>
	{$n=1} {foreach $products as $p}
	<tr height="20">
		<td width="40">{$n}</td>
		<td width="200">{echo encode($p->getProductName())} {echo
			encode($p->getVariantName())}</td>
		<td width="50">{lang('Pieces.','admin')}.</td>
		<td width="65">{echo $p->getQuantity()}</td>
		<td width="100">{echo $p->getPrice(true)}</td>
		<td width="100">{echo money_format('%i',$p->getPrice(true) *
			$p->getQuantity())}</td>
	</tr>
	{$n++} {/foreach}
</table>
<span align="right"> {lang('All','admin')}: {echo
	money_format('%i', $totalPrice)} </span>
<br />
<br />
<br />
EMail: {echo $model->UserEmail}
<br />
{lang('Delivery Address','admin')}: {echo $model->user_deliver_to}
<br />
{lang('Phone','admin')}: {echo $model->UserPhone}
<br />
