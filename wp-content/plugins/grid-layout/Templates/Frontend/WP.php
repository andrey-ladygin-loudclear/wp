<?php
/**
 * @var $widget GL\Widgets\WP
 */
?>
	
<div class='widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> well' style='border: 1px solid;min-height: <?= $widget->getHeight()*60; ?>px;'>
	<?php the_widget($widget->name, $widget->instance, $widget->args); ?>
</div>