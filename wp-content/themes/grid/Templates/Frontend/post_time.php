<?php
/**
 * @var $widget GL\Widgets\Components\Post_Time
 */
?>

<div class='<?= $widget->getClass(); ?>'>
	
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>

	<?php
	if(!empty($widget->options['before'])) {
		echo $widget->options['before'];
	}
	
	the_time($widget->options['format']);
	
	if(!empty($widget->options['after'])) {
		echo $widget->options['after'];
	}
	?>
</div>