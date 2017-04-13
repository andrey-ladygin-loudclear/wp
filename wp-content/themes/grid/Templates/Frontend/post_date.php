<?php
/**
 * @var $widget GL\Widgets\Components\Post_Date
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
	
	echo get_the_date($widget->options['format']);
	
	if(!empty($widget->options['after'])) {
		echo $widget->options['after'];
	}
	?>
</div>