<?php
if( !isset($gCms) ) exit();

$content = $params['content'];

$alias = $this->Translit($content->Alias());

$content->SetAlias($alias);

?>

