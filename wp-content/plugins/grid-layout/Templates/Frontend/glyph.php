<div class='container-fluid widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> well' style='border: 1px solid red;min-height: <?= $widget->getHeight()*60; ?>px;'>
	<span class="label label-default"><?= $widget->getName(); ?></span>
<?php
    foreach($widget->getChildren() as $child) {
        $child->draw();
    }
?>
</div>