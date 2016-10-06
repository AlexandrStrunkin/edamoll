<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
    $strdescmeta="";
    if ($arResult["UF_DESC"] <> "") {
        $strdescmeta = $arResult["UF_DESC"];
    } else {
        $strdescmeta = "� ��������� ".$arResult["NAME"]." ��������-�������� edamoll.ru ����������� ������� ����������� �������, ������� �� ������ ���������� �� ������ ����.".
        " ��������� ������ ��������� ".$arResult["NAME"]." � ��������� �� ������ � �������.";
    }
    if ($arResult["UF_PAGETITLE"] <> "") {
        $title = $arResult["UF_PAGETITLE"];
    } else {
        $title = $arResult["NAME"] . " - ������ � ��������-�������� edamoll.ru �� ������ ���� � ��������� �� ������ � ���������� �������.";
    }
    $APPLICATION->SetPageProperty("description", $strdescmeta);
    $APPLICATION->SetPageProperty("title", $title);
?>

<h1 style="color:rgb(255,0,57);">
    <?
        $h2exists = $APPLICATION->IncludeFile(
            SITE_DIR."include/h2/".$arResult["CODE"].".php",
            array(),
            array("MODE"=>"text",
                "NAME"      => " h2 �������",
                "TEMPLATE"  => "empty.php")
        );
        if (!$h2exists == 1) {
            echo $arResult["NAME"];
        }
    ?>

</h1>

<? 
    if(count($arResult["ITEMS"]) > 0) { 
        $notifyOption = COption::GetOptionString("sale", "subscribe_prod", "");
        $arNotify = unserialize($notifyOption);
        if (!$_GET["ALL"] == 1) {
        ?>
        <div class="nav_top">
            <?=$arResult["NAV_STRING"];?>
        </div>
        <div class= "clear">
        </div>
        <?
        } else {
        ?>
        <div class="nav_top">
            <div class="system-nav-orange">
                <div class="nav-all-div fll" >
                    <?
                        $APPLICATION->IncludeFile(
                            SITE_DIR."include/sort_products.php",
                            array(),
                            array("MODE "=> "html")
                        );
                    ?>
                </div>
            </div>
        </div>
        <div class= "clear">
        </div>
        <?
        }
    ?>
    <h3 class="SALELEADERS">
        <span class="pinktext">
        </span>
    </h3>
    <div class="listitem-carousel">
        <div class="lsnn" id="foo_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>">
            <?
                foreach($arResult["ITEMS"] as $key => $arItem) {
                    if (is_array($arItem)) { 
                        $flag_discount = false;
                    ?>
                    <div class="catalog_item_container">
                        <? 
                            if ($arItem["CAN_BUY"]) {                        
                            ?>
                            <div class="catalog_item_buy">
                                <form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
                                    <a class="minus" onclick="minus('q_<?=$arItem['ID']?>','<?=$arItem["PROPERTIES"]["CML2_BASE_UNIT"]["VALUE"]?>')">
                                    </a>
                                    <? 
                                        if($arItem["PROPERTIES"]["CML2_BASE_UNIT"]["VALUE"]=="��" || $arItem["PROPERTIES"]["CML2_BASE_UNIT"]["VALUE"]=="��") {
                                            $g_qu = "1.0";
                                        } else {
                                            $g_qu = "1";
                                        } 
                                    ?>
                                    <input  onchange="edit_q('q_<?=$arItem['ID']?>','<?=$arItem["PROPERTIES"]["CML2_BASE_UNIT"]["VALUE"]?>')" id="q_<?=$arItem['ID']?>" type="text" 
                                        size="6" class="quantity" type="text" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" 
                                        value="<?=$g_qu?> <?=$arItem["PROPERTIES"]["CML2_BASE_UNIT"]["VALUE"]?>">
                                    <a class="plus" onclick="plus('q_<?=$arItem['ID']?>','<?=$arItem["PROPERTIES"]["CML2_BASE_UNIT"]["VALUE"]?>')">
                                    </a>
                                    <input type="hidden" name="<?=$arParams["ACTION_VARIABLE"]?>" value="BUY">
                                    <input type="hidden" name="<?=$arParams["PRODUCT_ID_VARIABLE"]?>" value="<?=$arItem["ID"]?>">
                                    <a href="<?=$arItem["ADD_URL"]?>" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>" class="addtoCart" value="" 
                                        onclick="return addToCart(this, '<?=str_replace("'","&lsquo;",$arItem["NAME"])?>','q_<?=$arItem['ID']?>','<?=$arItem["PROPERTIES"]["CML2_BASE_UNIT"]["VALUE"]?>');">
                                    </a>
                                </form>
                            </div>
                            <?
                            }
                        ?>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"  class="item_title" title="<?=$arItem["NAME"]?>">
                            <div class="catalog_item" itemscope itemtype = "http://schema.org/Product">
                                <?
                                    if (is_array(($arItem["PREVIEW_PICTURE"]))) {
                                    ?>
                                    <div class="catalog_foto" align="center">
                                        <?
                                            $gmargtop = round((148 - $arItem["PREVIEW_PICTURE"]["HEIGHT"]) / 2);
                                        ?>
                                        <div class="img_helper">
                                        </div>
                                        <img class="item_img" itemprop="image" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" 
                                            height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>"/>
                                    </div>
                                    <?
                                    } else {
                                    ?>
                                    <div class="catalog_no_foto">
                                    </div>
                                    <?
                                    }
                                ?>

                                <div class="catalog_item_price" align="center">
                                    <?
                                        $numPrices = count($arParams["PRICE_CODE"]);
                                        foreach ($arItem["PRICES"] as $code=>$arPrice) {
                                            if ($arPrice["CAN_ACCESS"]) {
                                                if ($numPrices > 1) {
                                                ?>
                                                <p style="padding: 0; margin-bottom: 5px;"><?=$arResult["PRICES"][$code]["TITLE"];?>:</p>
                                                <?
                                                }
                                                $g_pv = round(100 * ($arPrice["VALUE"] - floor($arPrice["VALUE"])));
                                                if (strlen($g_pv) < 2) {
                                                    $g_pv = $g_pv."0";
                                                }
                                                if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]){
                                                    $flag_discount = true;
                                                ?>
                                                <span itemprop = "price" class="old-price">
                                                    <?=floor($arPrice["VALUE"])?>
                                                    <span class="decimal">
                                                        <?=$g_pv?>
                                                    </span>
                                                </span>
                                                <? 
                                                    $g_dpv = round(100 * ($arPrice["DISCOUNT_VALUE"] - floor($arPrice["DISCOUNT_VALUE"])));
                                                    if (strlen($g_dpv) < 2) {
                                                        $g_dpv = $g_dpv."0";
                                                    }
                                                ?>
                                                <span itemprop = "price" class="item_price discount-price">
                                                    <?=floor($arPrice["DISCOUNT_VALUE"])?>
                                                    <span class="decimal">
                                                        <?=$g_dpv?>
                                                    </span>
                                                </span>
                                                <?
                                                } else {
                                                ?>
                                                <span itemprop = "price" class="item_price price">
                                                    <?=floor($arPrice["VALUE"])?>
                                                    <span class="decimal">
                                                        <?=$g_pv?>
                                                    </span>
                                                </span>
                                                <?
                                                }
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="catalog_item_name" align="center">
                                    <span itemprop = "name"><?=$arItem["NAME"]?></span>
                                </div>
                            </div>
                        </a>
                        <? 
                            if ($flag_discount == true) {
                            ?>
                            <div class="discount_panel" align="center">
                                <span>
                                    <? 
                                        if (!$arPrice["VALUE"] == 0){
                                            echo(/*round(100*($arPrice["VALUE"]-$arPrice["DISCOUNT_VALUE"])/$arPrice["VALUE"]).*/'%');
                                        }
                                    ?>
                                </span>
                            </div>
                            <?
                            }
                        ?>
                    </div> 
                    <? 
                    }
                }
            ?>
        </div>
        <div class="clear">
        </div>
        <div class="nav_bot">
            <?=$arResult["NAV_STRING"];?>
        </div>
        <div class= "clear">
        </div>
    </div>
    <?
    } elseif ($USER->IsAdmin()) {
    ?>
    <h3 class="hitsale">
        <span>
        </span>
        <?=GetMessage("CR_TITLE_".$arParams["FLAG_PROPERTY_CODE"])?>
    </h3>
    <div class="listitem-carousel">
        <?=GetMessage("CR_TITLE_NULL")?>
    </div>
    <?}?>
