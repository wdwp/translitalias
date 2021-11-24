<?php

$lang['friendlyname'] = 'TranslitAlias';
$lang['postinstall'] = "TranslitAlias was successfully installed";
$lang['postuninstall'] = 'TranslitAlias was successfully unistalled';
$lang['moddescription'] = 'Transliteration of the content page alias.';

$lang['help'] = <<<EOL
<h3>What does this do?</h3>
<p>Replacing letters of the non-Latin alphabet to the characters of the Latin alphabet for the content page alias. When you add a new content page or edit it, the page alias is translatirated automatically.</p>
<h3>How do I use it?</h3>
<p>The module has not any settings. Simply install it.</p>
<p>Use User Defined Tag for the module News:</p>
<pre>
\$mod = cms_utils::get_module('TranslitAlias');
\$db  = cmsms()->GetDb();
if ( !isset(\$params['news_url']) || \$params['news_url'] == '' ) {
  \$news_url = 'news/'.\$params['news_id'].'/'.\$mod->Translit(\$params['title']);
  \$query = 'UPDATE ' . cms_db_prefix() . 'module_news SET news_url = ? WHERE news_id = ?';
  \$db->Execute(\$query, array(\$news_url, \$params['news_id']));
  news_admin_ops::delete_static_route(\$params['news_id']);
  news_admin_ops::register_static_route(\$news_url, \$params['news_id']);
}
</pre>
<p>And add it to the Event Manager for events NewsArticleAdded and NewsArticleEdited.</p>
<br>
<p>Copy modifier.translit.php from the directory modules/TranslitAlias to assets/plugins,
if you are going to use it for the module CGBlog, for example.</p>
<br>
<p>Copyright &copy; 2021, Yuri Haperski <a href="mailto:wdwp@yandex.ru">&lt;wdwp@yandex.ru&gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>
EOL;
