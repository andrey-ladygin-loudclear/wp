<?php
/**
 * @var $widget GL\Widgets\WP
 */
?>

<div class='widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?>'>
	<div id="<?= $widget->getIdAttribute(); ?>">
		<?php the_widget($widget->name, $widget->options, $widget->args); ?>
	</div>
</div>