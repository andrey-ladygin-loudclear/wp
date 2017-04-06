<?php
/**
 * @var $widget GL\Widgets\WP
 */
?>

<div class='<?= $widget->getClass(); ?>'>
	<div id="<?= $widget->getIdAttribute(); ?>">
		<?php the_widget($widget->name, $widget->options, $widget->args); ?>
	</div>
</div>