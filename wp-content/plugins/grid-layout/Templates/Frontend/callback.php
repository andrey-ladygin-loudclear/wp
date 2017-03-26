<?php
/**
 * @var $widget GL\Widgets\Text
 * @var $func mixed
 */
?>

<div class='widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> well' style='border: 1px solid;min-height: <?= $widget->getHeight()*60; ?>px;'>
	<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php $func(); ?>
</div>