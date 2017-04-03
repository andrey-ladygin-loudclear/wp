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
//	the_post();
//	posts_nav_link();
//	var_dump(get_the_posts_pagination());die;
	the_posts_pagination($widget->options);
	?>
	<?php the_posts_pagination( array(
		'mid_size' => 2,
		'prev_text' => __( 'Back', 'textdomain' ),
		'next_text' => __( 'Onward', 'textdomain' ),
	) ); ?>
	
	<?php
	
	if(!empty($widget->options['after'])) {
		echo $widget->options['after'];
	}
	?>
</div>