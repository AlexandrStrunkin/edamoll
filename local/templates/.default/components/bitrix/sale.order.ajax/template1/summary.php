<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="sale_order_full_div">
<table class="sale_order_full_2">
	<? /*
	<tr>
		<th><?=GetMessage("SOA_TEMPL_SUM_NAME")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_PROPS")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_PRICE_TYPE")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_WEIGHT")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_QUANTITY")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_PRICE")?></th>
	</tr>

	foreach($arResult["BASKET_ITEMS"] as $arBasketItems)
	{
		?>
		<tr>
			<td><?=$arBasketItems["NAME"]?></td>
			<td>
				<?
				foreach($arBasketItems["PROPS"] as $val)
				{
					echo $val["NAME"].": ".$val["VALUE"]."<br />";
				}
				?>
			</td>
			<td><?=$arBasketItems["NOTES"]?></td>
			<td><?=$arBasketItems["DISCOUNT_PRICE_PERCENT_FORMATED"]?></td>
			<td><?=$arBasketItems["WEIGHT_FORMATED"]?></td>
			<td><?=$arBasketItems["QUANTITY"]?></td>
			<td align="right"><?=$arBasketItems["PRICE_FORMATED"]?></td>
		</tr>
		<?
} */
	?>
	<?/*
	<tr>
		<td align="right"><b><?=GetMessage("SOA_TEMPL_SUM_WEIGHT_SUM")?></b></td>
		<td align="right" colspan="6"><?=$arResult["ORDER_WEIGHT_FORMATED"]?></td>
	</tr>
*/?>

	<tr>
		<td align="left"><b>����� ������:</b></td>
		<td align="right"><?=$arResult["ORDER_PRICE_FORMATED"]?></td>
	</tr>
	<?/*
	if (doubleval($arResult["DISCOUNT_PRICE"]) > 0)
	{
		?>
		<tr>
			<td align="right"><b><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?><?if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0):?> (<?echo $arResult["DISCOUNT_PERCENT_FORMATED"];?>)<?endif;?>:</b></td>
			<td align="right" colspan="6"><?echo $arResult["DISCOUNT_PRICE_FORMATED"]?>
			</td>
		</tr>
		<?
	}

	if (doubleval($arResult["VAT_SUM_FORMATED"]) > 0)
	{
		?>
		<tr>
			<td align="right">
				<b><?=GetMessage("SOA_TEMPL_SUM_VAT")?></b>
			</td>
			<td align="right" colspan="6"><?=$arResult["VAT_SUM_FORMATED"]?></td>
		</tr>
		<?
	}

	if(!empty($arResult["arTaxList"]))
	{
		foreach($arResult["arTaxList"] as $val)
		{
			?>
			<tr>
				<td align="right"><?=$val["NAME"]?> <?=$val["VALUE_FORMATED"]?>:</td>
				<td align="right" colspan="6"><?=$val["VALUE_MONEY_FORMATED"]?></td>
			</tr>
			<?
		}
	}*/
	if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
	{
		?>
		<tr>
			<td align="left">
				<b>��������� ��������: </b>
			</td>
			<td align="right"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></td>
		</tr>
		<?
	}
 ?>
	<tr><td colspan="2" class="bortop"></td></tr>
	<tr>
		<td align="left"><b>����� ���������: </b></td>
		<td align="right"><b><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></b>
		</td>
	</tr>
	<?
	if (strlen($arResult["PAYED_FROM_ACCOUNT_FORMATED"]) > 0)
	{
		?>
		<tr>
			<td align="right"><b><?=GetMessage("SOA_TEMPL_SUM_PAYED")?></b></td>
			<td align="right"><?=$arResult["PAYED_FROM_ACCOUNT_FORMATED"]?></td>
		</tr>
		<?
	}
	?>
</table>
</div>

