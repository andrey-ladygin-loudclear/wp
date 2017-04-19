<?php
/**
 * @var $widget GL\Widgets\WP
 */
?>

<div class='<?= $widget->getClass(); ?>'>
	<div id="<?= $widget->getIdAttribute(); ?>">
		<?php
		$widget->options['nav_menu'] = 'footer-menu';
		?>
		<?php the_widget($widget->name, $widget->options, $widget->args); ?>
	</div>
</div>