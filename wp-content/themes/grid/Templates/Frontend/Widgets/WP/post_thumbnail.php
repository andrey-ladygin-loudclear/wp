<?php
/**
 * @var $widget GL\Widgets\Components\Post_thumbnail
 */
?>

<div class='<?= $widget->getClass(); ?>'>
	
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
	<?php if (has_post_thumbnail()) {
		
		if(!empty($widget->options['before'])) {
			echo $widget->options['before'];
		}
		
		if(!empty($widget->options['width']) || !empty($widget->options['height'])) {
			set_post_thumbnail_size($widget->options['width'], $widget->options['height'], $widget->options['crop'] == '1');
		}
		
		if(!empty($widget->options['show']) && $widget->options['show'] == 'image') {
			the_post_thumbnail();
		} else {
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				<?php the_post_thumbnail(); ?>
			</a>
			<?php
		}
		
		
		if(!empty($widget->options['after'])) {
			echo $widget->options['after'];
		}
		?>
		
	<?php } ?>
</div>