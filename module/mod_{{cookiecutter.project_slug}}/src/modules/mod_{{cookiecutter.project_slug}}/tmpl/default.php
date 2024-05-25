<?php
{% include "docHeader.txt" ignore missing %}

\defined('_JEXEC') or die;

if (!$list) {
    return;
}

?>
<dl class="mod-{{cookiecutter.project_slug}} {{cookiecutter.project_slug}}-module mod-list">
    <?php foreach ($list as $item) : ?>
    <dt>
        <?php echo $item->title; ?>
    </dt>
    <dd>
        <?php echo $item->introtext; ?> 
    </dd>
    <?php endforeach; ?>
</ul>