<?php
/**
 * @var $widget GL\Widgets\Components\Post_content
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
	
	//https://developer.wordpress.org/reference/functions/the_content/
	//the_content('Read more ...');
	the_content();
	
	if(!empty($widget->options['after'])) {
		echo $widget->options['after'];
	}
	?>
</div>