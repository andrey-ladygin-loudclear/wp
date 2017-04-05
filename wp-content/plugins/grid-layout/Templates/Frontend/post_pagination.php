<?php
/**
 * @var $widget GL\Widgets\Components\Post_Pagination
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
	$args = array(
		'base'               => '%_%',
		'format'             => '/%#%',
		'total'              => 1,
		'current'            => 0,
		'show_all'           => false,
		'end_size'           => 1,
		'mid_size'           => 2,
		'prev_next'          => true,
		'prev_text'          => __('« Previous'),
		'next_text'          => __('Next »'),
		'type'               => 'plain',
		'add_args'           => false,
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => ''
	);
	
	global $wp_query;
	
	$big = 999999999; // need an unlikely integer
	
	the_posts_pagination( array(
		'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
		'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
	) );die;
	
	echo paginate_links( array(
		//'base' => str_replace( 'page/'.$big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'base' => esc_url(get_pagenum_link()).'/%#%',
		'format' => '?paged=%#%',
//		'format' => '?%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
	) );
	die();
	the_posts_pagination();
	$c = paginate_links( $args );
	var_dump($c);
	//the_posts_pagination($widget->options);
	
	?>
	<?php next_post_link( '/grid/p/%link', 'Next post in category', TRUE ); ?>
	<?php
	
	if(!empty($widget->options['after'])) {
		echo $widget->options['after'];
	}
	?>
</div>