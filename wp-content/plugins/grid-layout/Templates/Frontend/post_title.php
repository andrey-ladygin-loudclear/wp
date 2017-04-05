<?php
/**
 * @var $widget GL\Widgets\Components\Post_title
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
	
	the_title();
	
	if(!empty($widget->options['after'])) {
		echo $widget->options['after'];
	}
	?>
</div>