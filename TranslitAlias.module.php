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
		return '1.0';
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
}

?>