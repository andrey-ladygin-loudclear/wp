<?php
/**
 * @var $widget GL\Widgets\Components\Post_Permalink
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
	?>

	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	
	<?php
	if(!empty($widget->options['after'])) {
		echo $widget->options['after'];
	}
	?>
</div>