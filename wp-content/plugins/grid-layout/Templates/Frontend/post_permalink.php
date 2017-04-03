<?php
/**
 * @var $widget GL\Widgets\Text
 */
?>

<div class='widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> <?= GL_Grid_Layout::DEBUG ? 'well' : ''; ?>'>
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