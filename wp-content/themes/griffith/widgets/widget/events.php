<?php
	$postPerPage = GriffithSettings::$options['widgets']['events']['num_visible_items'];
	if (!$postPerPage) $postPerPage = -1;
	$args = array(
		'posts_per_page'	=> $postPerPage,
		'post_type'			=> 'event',
		'post_status'		=> 'publish',
		'meta_key'			=> 'event_date',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'DESC'
	);
	$items = get_posts($args);
?>
<section itemscope itemtype="http://schema.org/EducationalOrganization" class="list widget">
	<h2>Events</h2>
	<ol class="listed">
		<?php foreach ($items as $item): ?>
			<li itemscope itemtype="http://schema.org/EducationEvent" class="item">
				<h3 class='event-header' itemprop="name"><?php echo $item->post_title ?></h3>
				<a itemprop="url" href="<?php echo get_permalink($item->ID) ?>">Read More ></a>
			</li>
		<?php endforeach ?>
	</ol>
</section>
