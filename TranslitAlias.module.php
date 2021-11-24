<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: TranslitAlias (c) 2021, Yuri Haperski (wdwp@yandex.ru)
#
#-------------------------------------------------------------------------
#
# CMSMS - CMS Made Simple is (c) 2006 - 2021 by CMS Made Simple Foundation
# CMSMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# Visit the CMSMS Homepage at: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE

class TranslitAlias extends CMSModule {

	function GetName() {
		return 'TranslitAlias';
	}

	function GetFriendlyName() {
		return $this->Lang ( 'friendlyname' );
	}

	function GetVersion() {
		return '1.2';
	}

	function MinimumCMSVersion() {
		return '2.0';
	}

	function GetAuthor() {
		return 'Yuri Haperski';
	}

	function GetAuthorEmail() {
		return 'wdwp@yandex.ru';
	}

	function IsPluginModule() {
		return false;
	}

	function HasAdmin() {
		return false;
	}

	function GetHelp() {
		return $this->Lang ( 'help' );
	}

	function GetAdminDescription() {
		return $this->Lang ( 'moddescription' );
	}

	function InstallPostMessage() {
		return $this->Lang ( 'postinstall' );
	}

	function UninstallPostMessage() {
		return $this->Lang ( 'postuninstall' );
	}

	function HandleEvents() {
		return true;
	}

	function DefaultLanguage(){
		return 'en_US';
	}

	function Install() {

		$this->AddEventHandler('Core', 'ContentEditPre', false);

		$this->Audit(0, $this->GetName(), $this->Lang('postinstall', $this->GetVersion()));

	}

	function Uninstall() {

		$this->RemoveEventHandler('Core', 'ContentEditPre');

		$this->Audit(0, $this->GetName(), $this->Lang('postuninstall', $this->GetVersion()));

	}

	function Translit($alias) {

		$toreplace  = array(
					"Ä","ä","Æ","æ","Ǽ","ǽ","Å","å","Ǻ","ǻ","À","Á","Â","Ã","à","á","â","ã","Ā","ā","Ă","ă","Ą","ą","Ǎ","ǎ","Ạ","Ạ","ạ","Ả","ả","Ấ","ấ","Ầ","ầ","Ẩ","ẩ","Ẫ","ẫ","Ậ","ậ","Ắ","ắ","Ằ","ằ","Ẳ","ẳ","Ẵ","ẵ","Ặ","ặ",
					"Ç","ç","Ć","ć","Ĉ","ĉ","Ċ","ċ","Č","č",
					"Ð","ð","Ď","ď","Đ","đ",
					"È","É","Ê","Ë","è","é","ê","ë","Ē","ē","Ĕ","ĕ","Ė","ė","Ę","ę","Ě","ě","Ẹ","ẹ","Ẻ","ẻ","Ẽ","Ế","ế","Ề","ề","Ể","ể","ễ","Ệ","ệ","Ə","ə",
					"ſ","ſ",
					"Ĝ","ĝ","Ğ","ğ","Ġ","ġ","Ģ","ģ",
					"Ĥ","ĥ","Ħ","ħ",
					"Ì","Í","Î","Ï","ì","í","î","ï","Ĩ","ĩ","Ī","ī","Ĭ","ĭ","Į","į","İ","ı","Ǐ","ǐ","Ỉ","ỉ","Ị","ị",
					"Ĳ","ĳ",
					"ﬁ","ﬂ",
					"Ĵ","ĵ",
					"Ķ","ķ","ĸ",
					"Ĺ","ĺ","Ļ","ļ","Ľ","ľ","Ŀ","ŀ","Ł","ł",
					"Ñ","ñ","Ń","ń","Ņ","Ň","ň","ŉ","Ŋ","ŋ",
					"Ö","ö","Ø","ø","Ǿ","ǿ","Ò","Ó","Ô","Õ","ò","ó","ô","õ","Ō","ō","Ŏ","ŏ","Ő","ő","Ǒ","ǒ","Ọ","ọ","Ỏ","ỏ","Ố","ố","Ồ","ồ","Ổ","ổ","Ỗ","ỗ","Ộ","ộ","Ớ","ớ","Ờ","ờ","Ở","ở","Ỡ","ỡ","Ợ","ợ","Ơ","ơ",
					"Œ","œ",
					"Ŕ","ŕ","Ŗ","ŗ","Ř","ř",
					"Ś","ś","Ŝ","Ş","ş","Š","š",
					"Ţ","ţ","Ť","ť","Ŧ","ŧ",
					"Ü","ü","Ù","Ú","Û","ù","ú","û","Ụ","ụ","Ủ","ủ","Ứ","ứ","Ừ","ừ","Ữ","ữ","Ự","ự","Ũ","ũ","Ū","ū","Ŭ","ŭ","Ů","ů","Ű","ű","Ų","ų","Ǔ","ǔ","ǖ","ǘ","Ǚ","ǚ","Ǜ","ǜ","Ư","ư",
					"Ŵ","ŵ","Ẁ","ẁ","Ẃ","ẃ","Ẅ","ẅ",
					"Ý","ý","ÿ","Ŷ","ŷ","Ÿ","Ỳ","ỳ","Ỵ","ỵ","Ỷ","ỷ","Ỹ","ỹ",
					"Þ","þ","ß",
					"Ź","ź","Ż","ż","Ž","ž",
					"А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С",
					"Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ы", "Ь", "Э", "Ю", "Я",
					"а", "б", "в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с",
					"т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я"," "
		);

		$replacement = array(
					"ae","ae","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
					"c","c","c","c","c","c","c","c","c","c",
					"d","d","d","d","d","d",
					"e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e","e",
					"f","f",
					"g","g","g","g","g","g","g","g",
					"h","h","h","h",
					"i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i","i",
					"ij","ij",
					"fi","fl",
					"j","j",
					"k","k","k",
					"l","l","l","l","l","l","l","l","l","l",
					"n","n","n","n","n","n","n","n","n","n",
					"oe","oe","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
					"oe","oe",
					"r","r","r","r","r","r",
					"s","s","s","s","s","s","s",
					"t","t","t","t","t","t",
					"ue","ue","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u","u",
					"w","w","w","w","w","w","w","w",
					"y","y","y","y","y","y","y","y","y","y","y","y","y","y",
					"th","th","ss",
					"z","z","z","z","z","z",
					"a", "b", "v", "g", "d", "e", "e", "zh", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s",
					"t", "u", "f", "h", "ts", "ch", "sh", "sch", "", "y", "", "e", "yu", "ya",
					"a", "b", "v", "g", "d", "e", "e", "zh", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s",
					"t", "u", "f", "h", "ts", "ch", "sh", "sch", "", "y", "", "e", "yu", "ya","-"
		);

		return str_replace($toreplace, $replacement, $alias);

	}
}
