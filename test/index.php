<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("test");
?>
<div>
    <table style="float:left;">
        <col width="200"> 
        <tr><td style="color:#815e5e; font-size:16px">ФИО</td><td>3,5</td></tr>
        <tr><td style="color:#815e5e; font-size:16px">Номер телефона</td><td>4</td></tr>
        <tr><td style="color:#815e5e; font-size:16px">Email</td><td>4,5</td></tr>
        <tr><td style="color:#815e5e; font-size:16px">Адрес доставки</td><td>5</td></tr>
        <tr><td style="color:#815e5e; font-size:16px">Дата доставки</td><td>5,5</td></tr>
        <tr><td style="color:#815e5e; font-size:16px">Оплата банковской картой во время доставки</td><td>6</td></tr>    
        <tr><td style="color:#815e5e; font-size:16px">Комментарий к заказу</td><td>6</td></tr>
    </table>
    <div style="float:right; width:350px; font-size:16px">
        <div style="float:left; width:200px"><b>СУММА ЗАКАЗА:</b></div><div style="float:right"><b>100Р</b></div>
        <div style="float:left; width:200px; height:45px; border-bottom: 1px solid black"><b>СТОИМОСТЬ ДОСТАВКИ:</b></div><div style="float:right; width:150px; height:45px; border-bottom:1px solid black; text-align:right;"><b>БЕСПЛАТНО</b></div>  
        <div style="float:left; width:200px"><b>ОБЩАЯ СТОИМОСТЬ:</b></div><div style="float:right"><b>100Р</b></div>
    </div>
</div>
    <?/*
        $ORDER_ID = 18755;
        $arOrder = CSaleOrder::GetByID($ORDER_ID));
        $db_props = CSaleOrderPropsValue::GetList(array("SORT" => "ASC"),array("ORDER_ID" => $ORDER_ID,));
        while($arOrderProps = $db_props->Fetch()) {
            if($arOrderProps["CODE"]){
                $arOrder[$arOrderProps["CODE"]] = $arOrderProps["VALUE"];
            }
        }
        $strOrderInfo .= '<table style="float:left;"><col width="200"><tr><td style="color:#815e5e; font-size:16px">ФИО</td><td>';
        $strOrderInfo .= $arOrder["name"];
        $strOrderInfo .= '</td></tr><tr><td style="color:#815e5e; font-size:16px">Номер телефона</td><td>';
        $strOrderInfo .= $arOrder["tel"];
        $strOrderInfo .= '</td></tr><tr><td style="color:#815e5e; font-size:16px">Email</td><td>';
        $strOrderInfo .= $arOrder["email"];
        $strOrderInfo .= '</td></tr><tr><td style="color:#815e5e; font-size:16px">Адрес доставки</td><td>';
        $strOrderInfo .= $arOrder["adres"];
        $strOrderInfo .= '</td></tr><tr><td style="color:#815e5e; font-size:16px">Дата доставки</td><td>';
        $strOrderInfo .= $arOrder["delivery_date"];
        $strOrderInfo .= '</td></tr><tr><td style="color:#815e5e; font-size:16px">Оплата банковской картой во время доставки</td><td>';
        $strOrderInfo .= $arOrder["card_payment"];
        $strOrderInfo .= '</td></tr><tr><td style="color:#815e5e; font-size:16px">Комментарий к заказу</td><td>';
        $strOrderInfo .= $arOrder["COMMENTUSER"];
        $strOrderInfo .= '</td></tr></table>';
        $strOrderInfo .= '<div style="float:right; width:350px; font-size:16px"><div style="float:left; width:200px"><b>СУММА ЗАКАЗА:</b></div><div style="float:right"><b>';
        $strOrderInfo .= $arOrder["PRICE"];
        $strOrderInfo .= '</b></div><div style="float:left; width:200px; border-bottom: 1px solid black"><b>СТОИМОСТЬ ДОСТАВКИ:</b></div><div style="float:right; width:150px; border-bottom:1px solid black; text-align:right;"><b>';
        $strOrderInfo .= $arOrder["PRICE_DELIVERY"];
        $strOrderInfo .= '</b></div><div style="float:left; width:200px"><b>ОБЩАЯ СТОИМОСТЬ:</b></div><div style="float:right"><b>';
        $strOrderInfo .= $arOrder["PRICE"] + $arOrder["PRICE_DELIVERY"];
    */?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>