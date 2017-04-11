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

	<a href="<?php the_permalink(); ?>">
		<?php
		if($widget->getOption('text') == 'Title') {
			the_title();
		} else {
			echo $widget->getOption('text');
		}
		?>
	</a>
	
	<?php
	if(!empty($widget->options['after'])) {
		echo $widget->options['after'];
	}
	?>
</div>