<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><div class="errors"><?=$arResult["FORM_ERRORS_TEXT"];?></div><?endif;?>
<?
function getRealIp()
{
 if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
 {
   $ip=$_SERVER['HTTP_CLIENT_IP'];
 }
 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 {
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 }
 else
 {
   $ip=$_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}

function getOS($userAgent) {
    $oses = array (
        'iPhone' => '(iPhone)',
        'Windows 3.11' => 'Win16',
        'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
        'Windows 98' => '(Windows 98)|(Win98)',
        'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
        'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
        'Windows 2003' => '(Windows NT 5.2)',
        'Windows Vista' => '(Windows NT 6.0)|(Windows Vista)',
        'Windows 7' => '(Windows NT 6.1)|(Windows 7)',
        'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
        'Windows ME' => 'Windows ME',
        'Open BSD'=>'OpenBSD',
        'Sun OS'=>'SunOS',
        'Linux'=>'(Linux)|(X11)',
        'Safari' => '(Safari)',
        'Macintosh'=>'(Mac_PowerPC)|(Macintosh)',
        'QNX'=>'QNX',
        'BeOS'=>'BeOS',
        'OS/2'=>'OS/2',
        'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
    );
  
    foreach($oses as $os=>$pattern){
        if(eregi($pattern, $userAgent)) {
            return $os;
        }
    }
    return 'Unknown';
}

function getUserBrowser($agent) {
	preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $agent, $browser_info); // ���������� ���������, ������� ��������� ����������� 90% ���������
        list(,$browser,$version) = $browser_info; // �������� ������ �� ������� � ����������
        if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) return 'Opera '.$opera[1]; // ����������� _�����_������_ ������ ����� (�� 8.50), ��� ������� ����� ������
        if ($browser == 'MSIE') { // ���� ������� �������� ��� IE
                preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie); // ���������, �� ���������� �� ��� �� ������ IE
                if ($ie) return $ie[1].' based on IE '.$version; // ���� ��, �� ���������� ��������� �� ����
                return 'IE '.$version; // ����� ������ ���������� IE � ����� ������
        }
        if ($browser == 'Firefox') { // ���� ������� �������� ��� Firefox
                preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff); // ���������, �� ���������� �� ��� �� ������ Firefox
                if ($ff) return $ff[1].' '.$ff[2]; // ���� ��, �� ������� ����� � ������
        }
        if ($browser == 'Opera' && $version == '9.80') return 'Opera '.substr($agent,-5); // ���� ������� �������� ��� Opera 9.80, ���� ������ ����� �� ����� ������
        if ($browser == 'Version') return 'Safari '.$version; // ���������� ������
        if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko'; // ��� ������������ ��������� ���������, ���� ��� �� ������ Gecko, � ��������� ��������� �� ����
        return $browser.' '.$version; // ��� ���� ��������� ���������� ������� � ������
}
?>
<div class="b-feedBack" style="margin-left: 175px; float: left;">
		<?=$arResult["FORM_HEADER"]?>
		<div class="b-feedBack-caption">�������� ���</div>
		<div class="b-feedBack-hint">����� ��� ����� �� ������ �������� ��� �� ������ �� �����, �������� ����������� ��� ������������ �� ���-������</div>
		<div class="b-feedBack-form">
			<div class="b-feedBack-row">
				<label>���<span class="b-feedBack-star">*</span></label>
				<input type="text" name="form_text_1" value="<?=$arResult["arrVALUES"]["form_text_1"];?>">
				<div class="b-feedBack-help">�������� ��� ������� �/��� email, �� ����������� �������� � ����<span class="b-feedBack-star">*</span> <span class="b-feedBack-red">(���������� ���� �� ������ �� ����� � �����������)</span></div>
			</div><!-- .b-feedBack-row -->
			<div class="b-feedBack-row">
				<label>�������</label>
				<input type="text" name="form_text_3" value="<?=$arResult["arrVALUES"]["form_text_3"];?>">
			</div><!-- .b-feedBack-row -->
			<div class="b-feedBack-row">
				<label>Email</label>
				<input type="text" name="form_text_4" value="<?=$arResult["arrVALUES"]["form_text_4"];?>">
				<input type="text" name="form_text_5" hidden="true" value="<?=getOS($_SERVER['HTTP_USER_AGENT']);?>">
				<input type="text" name="form_text_6" hidden="true" value="<?=getUserBrowser($_SERVER['HTTP_USER_AGENT']);?>">
				<input type="text" name="form_text_7" hidden="true" value="<?=getRealIp();?>">
			</div><!-- .b-feedBack-row -->
			<div class="b-feedBack-row">
				<label>����� ���������<span class="b-feedBack-star">*</span></label>
				<textarea name="form_textarea_2"><?=$arResult["arrVALUES"]["form_textarea_2"];?></textarea>
			</div><!-- .b-feedBack-row -->
			<div class="b-feedBack-red">* ����, ������������ ��� ����������</div>
			<div class="b-feedBack-row">
				<input class="b-redButton" type="submit" name="web_form_submit" value="���������">
			</div><!-- .b-feedBack-row -->
		</div>
		<?=$arResult["FORM_FOOTER"]?>
	</div><!-- .b-feedBack -->



