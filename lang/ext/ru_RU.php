<?php

$lang['friendlyname'] = 'TranslitAlias';
$lang['postinstall'] = "TranslitAlias успешно установлен";
$lang['postuninstall'] = 'TranslitAlias удалён';
$lang['moddescription'] = 'Транслитерация алиаса контента страницы.';

$lang['help'] = <<<EOL
<h3>Что этот модуль делает?</h3>
<p>Преобразует символы кириллицы в алиасе страницы в символы латинского алфавита. При редактировании или добавлении страницы с контентом это происходит автоматически.</p>
<h3>Как его использовать?</h3>
<p>У модуля нет настроек. Просто установите его.</p>
<p>Для модуля News используйте пользовательский тег UDT:</p>
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
<p>И добавьте его в События NewsArticleAdded и NewsArticleEdited.</p>
<br>
<p>Скопируйте модификатор smarty modifier.translit.php из директории modules/TranslitAlias в директорию assets/plugins,
если планирует использовать его, например, для модуля CGBlog.</p>
<br>
<p>Copyright &copy; 2021, Yuri Haperski <a href="mailto:wdwp@yandex.ru">&lt;wdwp@yandex.ru&gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>
EOL;
