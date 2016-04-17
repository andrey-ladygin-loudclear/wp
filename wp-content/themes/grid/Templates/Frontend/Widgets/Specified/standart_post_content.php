<?php
/**
 * @var $widget GL\Widgets\Specified\Latest_posts
 * @var $posts array
 * @var $before string
 * @var $after string
 * @var $wp_query WP_Query
 */
?>

<div class="clearfix widget <?= $widget->getClass(); ?>">
	<?php the_title(); ?>
	<?php the_post_thumbnail(); ?>
	<?php the_content(); ?>
</div>
	