<?php
	$postPerPage = GriffithSettings::$options['widgets']['testimonials']['num_visible_items'];
	if (!$postPerPage) $postPerPage = -1;
	$items = get_posts(array(
		'posts_per_page'	=> $postPerPage,
		'post_type'			=> 'testimonial',
		'post_status'		=> 'publish'
	));
?>
<section class="list widget">
	<h2>Testimonials</h2>
	<ol class="listed">
		<?php foreach ($items as $item): ?>
			<li class="item">
				<figure class="quote">
					<a href="<?php echo get_permalink($item->ID) ?>">
						<blockquote><?php echo get_field('content', $item->ID) ?></blockquote>
						<figcaption><?php echo get_field('name_program', $item->ID) ?></figcaption>
					</a>
				</figure>
			</li>
		<?php endforeach ?>
	</ol>
</section>