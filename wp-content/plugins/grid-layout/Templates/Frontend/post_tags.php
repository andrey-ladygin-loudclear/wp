<?php
/**
 * @var $widget GL\Widgets\Components\Post_Tags
 */
?>

<div class='<?= $widget->getClass(); ?>'>
	
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
	<?php the_tags($widget->options['before'], $widget->options['sep'], $widget->options['after']); ?>
</div>