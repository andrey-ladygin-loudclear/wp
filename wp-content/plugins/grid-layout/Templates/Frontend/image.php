<?php
/**
 * @var $widget GL\Widgets\Image
 */
?>

<div class='widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> well' style='border: 1px solid;min-height: <?= $widget->getHeight()*60; ?>px;'>
	<span class="label label-default"><?= $widget->getName(); ?></span>
    <?php foreach($widget->images as $image) { ?>
        <img src="<?= $image; ?>">
    <?php } ?>
</div>