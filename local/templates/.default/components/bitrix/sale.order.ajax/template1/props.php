<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--������ "���������� ������"-->
<script>document.write('<img src="http://mixmarket.biz/tr.plx?e=3779390&r='+escape(document.referrer)+'&t='+(new Date()).getTime()+'" width="1" height="1"/>');</script>
<!--������ "���������� ������"-->



<? //���������� ���� ������� ������� �������� ��� ������, ����������� ���� ���
function rus_date() {
  // �������
  $translate = array(
    "am" => "��",
    "pm" => "��",
    "AM" => "��",
    "PM" => "��",
    "Monday" => "�����������",
    "Mon" => "��",
    "Tuesday" => "�������",
    "Tue" => "��",
    "Wednesday" => "�����",
    "Wed" => "��",
    "Thursday" => "�������",
    "Thu" => "��",
    "Friday" => "�������",
    "Fri" => "��",
    "Saturday" => "�������",
    "Sat" => "��",
    "Sunday" => "�����������",
    "Sun" => "��",
    "January" => "������",
    "Jan" => "���",
    "February" => "�������",
    "Feb" => "���",
    "March" => "�����",
    "Mar" => "���",
    "April" => "������",
    "Apr" => "���",
    "May" => "���",
    "May" => "���",
    "June" => "����",
    "Jun" => "���",
    "July" => "����",
    "Jul" => "���",
    "August" => "�������",
    "Aug" => "���",
    "September" => "��������",
    "Sep" => "���",
    "October" => "�������",
    "Oct" => "���",
    "November" => "������",
    "Nov" => "���",
    "December" => "�������",
    "Dec" => "���",
    "st" => "��",
    "nd" => "��",
    "rd" => "�",
    "th" => "��"
  );
  // ���� �������� ����, �� ��������� ��
  if (func_num_args() > 1) {
    $timestamp = func_get_arg(1);
    return strtr(date(func_get_arg(0), $timestamp), $translate);
  } else {
    // ����� ������� ����
    return strtr(date(func_get_arg(0)), $translate);
  }
}

function generateThreeDates(){
  $addedDays = 0;
  if(CModule::IncludeModule("iblock"))
    {
      $three_hours = mktime(date("G")+3, date("i")+10, 0, date("n"), date("j"), date("Y"));
      //echo date("Y-m-d");
      $arDates["1"]["timestamp"] = findNextDate($three_hours, true);
      $arDates["1"]["TEXT"] = rus_date("d.m.Y (D)", $arDates["1"]["timestamp"]);
      for ($i = 2; $i <= 7;  $i++) {
        $arDates[$i]["timestamp"] = findNextDate($arDates[$i-1]["timestamp"], false);
        $arDates[$i]["TEXT"] = rus_date("d.m.Y (D)", $arDates[$i]["timestamp"]);
      }
    }
  return $arDates;
}

function findNextDate($date_timestamp, $first){
  if(!isDateExcluded($date_timestamp) && $first){
    //������ ���� ���������� ��������
    return $date_timestamp;
  } else {
    do {
      $date_timestamp = mktime(date("G", $date_timestamp), date("i", $date_timestamp), 0, date("n", $date_timestamp), date("j", $date_timestamp)+1, date("Y", $date_timestamp));
    } while(isDateExcluded($date_timestamp));
  }
  return $date_timestamp;
}

function isDateExcluded($date_timestamp){
  $res = CIBlockElement::GetList(array(), array("IBLOCK_ID" => "16", ">=PROPERTY_DATE_EXCLUDE" => date("Y-m-d", $date_timestamp)." 00:00:00", "<=PROPERTY_DATE_EXCLUDE" => date("Y-m-d", $date_timestamp)." 23:59:59",), false, false, array("ID", "IBLOCK_ID", "NAME", "PROPERTY_DATE_EXCLUDE"));
  if($res->GetNextElement()){
    return true;
  }
  return false;
}
?>



<?
$rsUser = CUser::GetByID($USER->GetID());
global $arUser2;
$arUser2 = $rsUser->Fetch();

function PrintPropsForm($arSource=Array(), $locationTemplate = ".default")
  {
    $is_first = true;
  //  $arSource = $arSource["USER_PROPS_Y"]; //������� ��� ����� ������������ �������� �� �� �������
    $arSource = array_merge($arSource["USER_PROPS_Y"], $arSource["USER_PROPS_N"]); //������� ��� ����� ������������ �������� �� �� �������
    //$arSource = $arSource["USER_PROPS_Y"];

    global $arUser2;
    if (!empty($arSource))
      {
        ?>

        <?
        foreach($arSource as $arProperties)
          {
            if($arProperties["ID"]==12)
              continue;
            if($arProperties["SHOW_GROUP_NAME"] == "Y" && $is_first)
              {
                ?>
                <tr>
                  <td colspan="2">
                    <b class="propgroup"><?= $arProperties["GROUP_NAME"] ?></b>
                  </td>
                </tr>
                <?
                $is_first = false;
              }
            ?>
            <tr>
              <?if(!(date("G") < 22 && date("G") > 9) || $arProperties["FIELD_NAME"] != "ORDER_PROP_10"){ //����� ����� ������� ��� ��� ����, ����� ���� �� ������������ � ������� �����?>
                <td align="right" valign="top">
                  <?= $arProperties["NAME"] ?>:<?/*
					if($arProperties["REQUIED_FORMATED"]=="Y")
					{
						?><span class="sof-req">*</span><?
					}
*/?>
                </td>
                <td>
                  <?
                  if($arProperties["TYPE"] == "CHECKBOX")
                    {
                      ?>
                      <?if(!(date("G") < 22 && date("G") > 9) || $arProperties["FIELD_NAME"] != "ORDER_PROP_10"){?>
                      <input type="hidden" name="<?=$arProperties["FIELD_NAME"]?>" value="">
                      <input type="checkbox" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" value="Y" <?if($arProperties["FIELD_NAME"] == "ORDER_PROP_10") echo "checked";?>>
                    <?
                    }
                    }
                  elseif($arProperties["TYPE"] == "TEXT")
                    {
                      ?>
                      <? if($arProperties["FIELD_NAME"] == "ORDER_PROP_9"){?>

                      <? //����� ������� ���: ������������ ������ ���� ��������. �������� � ���, ��� ������� ������� ������� ��������� �������� ������ ������������� � ��������� ����, ����� ������ ��� ��������, ���� ���� ��������� �������� TEXT, � �� ����� ���� ��� ����� ����������� ���� ��������������
                      $arDates = generateThreeDates();
                      ?>

                      <select name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
                        <option disabled selected>�������� ����</option>
                        <option value="<?=$arDates[1]["TEXT"]?>" selected><?=$arDates[1]["TEXT"]?></option>
                        <?for ($i = 2; $i <= 7;  $i++):?>
                          <option value="<?=$arDates[$i]["TEXT"]?>"><?=$arDates[$i]["TEXT"]?></option>
                        <?endfor;?>
                      </select>
                    <?} else {?>




                      <input type="text" maxlength="250" size="<?=$arProperties["SIZE1"]?>"  name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>"
                             value="<? if ($arProperties["VALUE"]=="") {

                               switch($arProperties["FIELD_NAME"]) {
                                 case "ORDER_PROP_2":  echo($arUser2["LAST_NAME"]); break;
                                 case "ORDER_PROP_7": echo($arUser2["NAME"]); break;
                                 case "ORDER_PROP_8": echo($arUser2["SECOND_NAME"]); break;
                                 case "ORDER_PROP_5": echo($arUser2["PERSONAL_PHONE"]); break;
                               }
                             } else {if ($arProperties["VALUE"]<>"noemail@edamoll.ru") echo($arProperties["VALUE"]);}?>">
                    <?
                    }
                    }
                  elseif($arProperties["TYPE"] == "SELECT")
                    {
                      ?>
                      <select name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">

                        <?

                        foreach($arProperties["VARIANTS"] as $arVariants)
                          {
                            ?>
                            <option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
                          <?
                          }

                        ?>
                      </select>
                    <?
                    }
                  elseif ($arProperties["TYPE"] == "MULTISELECT")
                    {
                      ?>
                      <select multiple name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
                        <?
                        foreach($arProperties["VARIANTS"] as $arVariants)
                          {
                            ?>
                            <option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
                          <?
                          }
                        ?>
                      </select>
                    <?
                    }
                  elseif ($arProperties["TYPE"] == "TEXTAREA")
                    {
                      ?>
                      <textarea rows="<?=$arProperties["SIZE2"]?>" cols="<?=$arProperties["SIZE1"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>"><?=$arProperties["VALUE"]?></textarea>
                    <?
                    }
                  elseif ($arProperties["TYPE"] == "LOCATION")
                    {
                      $value = 0;
                      if (is_array($arProperties["VARIANTS"]) && count($arProperties["VARIANTS"]) > 0)
                        {
                          foreach ($arProperties["VARIANTS"] as $arVariant)
                            {
                              if ($arVariant["SELECTED"] == "Y")
                                {
                                  $value = $arVariant["ID"];
                                  break;
                                }
                            }
                        }

                      $GLOBALS["APPLICATION"]->IncludeComponent(
                        "bitrix:sale.ajax.locations",
                        $locationTemplate,
                        array(
                             "AJAX_CALL" => "N",
                             "COUNTRY_INPUT_NAME" => "COUNTRY",//.$arProperties["FIELD_NAME"],
                             "REGION_INPUT_NAME" => "REGION",//.$arProperties["FIELD_NAME"],
                             "CITY_INPUT_NAME" => $arProperties["FIELD_NAME"],
                             "CITY_OUT_LOCATION" => "Y",
                             "LOCATION_VALUE" => $value,
                             "ORDER_PROPS_ID" => $arProperties["ID"],
                             "ONCITYCHANGE" => ($arProperties["IS_LOCATION"] == "Y" || $arProperties["IS_LOCATION4TAX"] == "Y") ? "submitForm()" : "",
                             "SIZE1" => $arProperties["SIZE1"],
                        ),
                        null,
                        array('HIDE_ICONS' => 'Y')
                      );
                    }
                  elseif ($arProperties["TYPE"] == "RADIO")
                    {
                      foreach($arProperties["VARIANTS"] as $arVariants)
                        {
                          ?>
                          <input type="radio" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>" value="<?=$arVariants["VALUE"]?>"<?if($arVariants["CHECKED"] == "Y") echo " checked";?>> <label for="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>"><?=$arVariants["NAME"]?></label><br />
                        <?
                        }
                    }

                  if (strlen($arProperties["DESCRIPTION"]) > 0)
                    {
                      ?><br /><small><?echo $arProperties["DESCRIPTION"] ?></small><?
                    }
                  ?>

                </td>
              <?}?>
            </tr>
          <?
          }
        ?>
        <?
        return true;
      }
    return false;
  }
?>

<?/*<b><?=GetMessage("SOA_TEMPL_PROP_INFO")?></b><br />*/?>
<table class="sale_order_full_table">
  <tr><td>
      <?
      if(!empty($arResult["ORDER_PROP"]["USER_PROFILES"]))
        {
          ?>
          <div style="display:none;">
            <?=GetMessage("SOA_TEMPL_PROP_CHOOSE")?><br />
            <select name="PROFILE_ID" id="ID_PROFILE_ID" onChange="SetContact(this.value)">
              <option value="0"><?=GetMessage("SOA_TEMPL_PROP_NEW_PROFILE")?></option>
              <?
              foreach($arResult["ORDER_PROP"]["USER_PROFILES"] as $arUserProfiles)
                {
                  ?>
                  <option value="<?= $arUserProfiles["ID"] ?>"<?if ($arUserProfiles["CHECKED"]=="Y") echo " selected";?>><?=$arUserProfiles["NAME"]?></option>
                <?
                }
              ?>
            </select>
            <br />
            <br />
          </div>
        <?

        }

      ?>
      <div style="display:none;">
        <?
        $APPLICATION->IncludeComponent(
          "bitrix:sale.ajax.locations",
          $arParams["TEMPLATE_LOCATION"],
          array(
               "AJAX_CALL" => "N",
               "COUNTRY_INPUT_NAME" => "COUNTRY_tmp",
               "REGION_INPUT_NAME" => "REGION_tmp",
               "CITY_INPUT_NAME" => "tmp",
               "CITY_OUT_LOCATION" => "Y",
               "LOCATION_VALUE" => "",
               "ONCITYCHANGE" => "submitForm()",
          ),
          null,
          array('HIDE_ICONS' => 'Y')
        );
        ?>
      </div>

      <table class="sale_order_full_table_no_border"  cellspacing=5>
        <?
        PrintPropsForm($arResult["ORDER_PROP"], $arParams["TEMPLATE_LOCATION"]);
        //PrintPropsForm($arResult["ORDER_PROP"]["USER_PROPS_Y"], $arParams["TEMPLATE_LOCATION"]);
        ?>
        <tr>
          <td  align="left" style="vertical-align: top;padding-top: 10px;">����������<br /> � ������:

          </td>
          <td>
            <? /*echo "<pre>";
print_r($arResult);
echo "</pre>";*/?>
            <textarea rows="4" cols="30" name="ORDER_DESCRIPTION"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea>
          </td>
      </table>
    </td></tr></table>

<input type="hidden" maxlength="250" size="100" name="ORDER_PROP_12" id="ORDER_PROP_12" value="1">
<input type="hidden" maxlength="250" size="100" name="ORDER_PROP_12" id="ORDER_PROP_12" value="1">