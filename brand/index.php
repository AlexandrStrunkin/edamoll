<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������");
?> <?$APPLICATION->IncludeComponent("bitrix:catalog", "brands", array(
	"IBLOCK_TYPE" => "brand",
	"IBLOCK_ID" => "13",
	"HIDE_NOT_AVAILABLE" => "N",
	"BASKET_URL" => "",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/brand/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "Y",
	"CACHE_GROUPS" => "Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"USE_ELEMENT_COUNTER" => "Y",
	"USE_FILTER" => "N",
	"USE_REVIEW" => "N",
	"USE_COMPARE" => "N",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "N",
	"SHOW_TOP_ELEMENTS" => "N",
	"SECTION_COUNT_ELEMENTS" => "N",
	"SECTION_TOP_DEPTH" => "1",
	"PAGE_ELEMENT_COUNT" => "99999",
	"LINE_ELEMENT_COUNT" => "8",
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "name",
	"ELEMENT_SORT_ORDER2" => "asc",
	"LIST_PROPERTY_CODE" => array(
		0 => "NAME2",
		1 => "",
	),
	"INCLUDE_SUBSECTIONS" => "Y",
	"LIST_META_KEYWORDS" => "-",
	"LIST_META_DESCRIPTION" => "-",
	"LIST_BROWSER_TITLE" => "-",
	"DETAIL_PROPERTY_CODE" => array(
		0 => "NAME2",
		1 => "URL2",
		2 => "BUKVA",
		3 => "",
	),
	"DETAIL_META_KEYWORDS" => "-",
	"DETAIL_META_DESCRIPTION" => "-",
	"DETAIL_BROWSER_TITLE" => "-",
	"LINK_IBLOCK_TYPE" => "",
	"LINK_IBLOCK_ID" => "",
	"LINK_PROPERTY_SID" => "",
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
	"USE_ALSO_BUY" => "N",
	"USE_STORE" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "������",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "edamoll",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"sections" => "",
		"section" => "#SECTION_ID#",
		"element" => "#ELEMENT_CODE#/",
		"compare" => "compare.php?action=#ACTION_CODE#",
	),
	"VARIABLE_ALIASES" => array(
		"compare" => array(
			"ACTION_CODE" => "action",
		),
	)
	),
	false
);?> 
<br />




<?
if (isset($GLOBALS['g_brand_elem'])){

$gname=$GLOBALS['g_brand_elem']['name']; 
//$arrFilter=array(
//    "NAME" => $gname);
$arrFilter=array(
	">CATALOG_QUANTITY"=>0,
    "PROPERTY_MARKA_VALUE" => $gname, 
    );

$APPLICATION->IncludeComponent("bitrix:catalog.section", "template2brands", Array(
	"IBLOCK_TYPE" => "1c_catalog",	// ��� ���������
	"IBLOCK_ID" => "11",	// ��������
	"SECTION_ID" => "",	// ID �������
	"SECTION_CODE" => "",	// ��� �������
	"SECTION_USER_FIELDS" => array(	// �������� �������
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "sort",	// �� ������ ���� ��������� ��������
	"ELEMENT_SORT_ORDER" => "asc",	// ������� ���������� ���������
	"ELEMENT_SORT_FIELD2" => "id",	// ���� ��� ������ ���������� ���������
	"ELEMENT_SORT_ORDER2" => "desc",	// ������� ������ ���������� ���������
	"FILTER_NAME" => "arrFilter",	// ��� ������� �� ���������� ������� ��� ���������� ���������
	"INCLUDE_SUBSECTIONS" => "Y",	// ���������� �������� ����������� �������
	"SHOW_ALL_WO_SECTION" => "Y",	// ���������� ��� ��������, ���� �� ������ ������
	"HIDE_NOT_AVAILABLE" => "N",	// �� ���������� ������, ������� ��� �� �������
	"PAGE_ELEMENT_COUNT" => isset($_GET["el_count"])?intval($_GET["el_count"]):"40",	// ���������� ��������� �� ��������
	"LINE_ELEMENT_COUNT" => "5",	// ���������� ��������� ��������� � ����� ������ �������
	"PROPERTY_CODE" => array(	// ��������
		0 => "CML2_BASE_UNIT",
		1 => "",
	),
	"OFFERS_LIMIT" => "5",	// ������������ ���������� ����������� ��� ������ (0 - ���)
	"SECTION_URL" => "",	// URL, ������� �� �������� � ���������� �������
	"DETAIL_URL" => "",	// URL, ������� �� �������� � ���������� �������� �������
	"BASKET_URL" => "/personal/basket.php",	// URL, ������� �� �������� � �������� ����������
	"ACTION_VARIABLE" => "action",	// �������� ����������, � ������� ���������� ��������
	"PRODUCT_ID_VARIABLE" => "id",	// �������� ����������, � ������� ���������� ��� ������ ��� �������
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// �������� ����������, � ������� ���������� ���������� ������
	"PRODUCT_PROPS_VARIABLE" => "prop",	// �������� ����������, � ������� ���������� �������������� ������
	"SECTION_ID_VARIABLE" => "SECTION_ID",	// �������� ����������, � ������� ���������� ��� ������
	"AJAX_MODE" => "N",	// �������� ����� AJAX
	"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
	"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
	"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "36000000",	// ����� ����������� (���.)
	"CACHE_GROUPS" => "Y",	// ��������� ����� �������
	"META_KEYWORDS" => "-",	// ���������� �������� ����� �������� �� ��������
	"META_DESCRIPTION" => "-",	// ���������� �������� �������� �� ��������
	"BROWSER_TITLE" => "-",	// ���������� ��������� ���� �������� �� ��������
	"ADD_SECTIONS_CHAIN" => "N",	// �������� ������ � ������� ���������
	"DISPLAY_COMPARE" => "N",	// �������� ������ ���������
	"SET_TITLE" => "Y",	// ������������� ��������� ��������
	"SET_STATUS_404" => "N",	// ������������� ������ 404, ���� �� ������� ������� ��� ������
	"CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
	"PRICE_CODE" => array(	// ��� ����
		0 => "���������",
	),
	"USE_PRICE_COUNT" => "N",	// ������������ ����� ��� � �����������
	"SHOW_PRICE_COUNT" => "1",	// �������� ���� ��� ����������
	"PRICE_VAT_INCLUDE" => "Y",	// �������� ��� � ����
	"PRODUCT_PROPERTIES" => "",	// �������������� ������
	"USE_PRODUCT_QUANTITY" => "Y",	// ��������� �������� ���������� ������
	"CONVERT_CURRENCY" => "N",	// ���������� ���� � ����� ������
	"QUANTITY_FLOAT" => "Y",	// ��������� �������� �������� ���������� ������
	"DISPLAY_TOP_PAGER" => "Y",	// �������� ��� �������
	"DISPLAY_BOTTOM_PAGER" => "Y",	// �������� ��� �������
	"PAGER_TITLE" => "������",	// �������� ���������
	"PAGER_SHOW_ALWAYS" => "Y",	// �������� ������
	"PAGER_TEMPLATE" => "edamoll",	// �������� �������
	"PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
	"PAGER_SHOW_ALL" => "Y",	// ���������� ������ "���"
	"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
	),
	false
);
echo ($GLOBALS['g_brand_elem']["h"]);
}

?>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>