<?php
	$postPerPage = GriffithSettings::$options['widgets']['news']['num_visible_items'];
	if (!$postPerPage) $postPerPage = -1;

	$tags = [];

	foreach(wp_get_post_tags(get_the_ID()) as $tag) {
		$tags[] = $tag->term_id;
	}

	$args = array(
		'posts_per_page'	=> $postPerPage,
		'post_type'			=> 'post',
		'post__not_in' 		=> array(get_the_ID()),
		'post_status'		=> 'publish'
	);

	if($tags) {
		$args['tag__in'] = $tags;
	}

	$items = get_posts($args);
?>
<section itemscope itemtype="http://schema.org/EducationalOrganization" class="news module no-side-padding white-bg">
	<div>
		<h2>Related News</h2>
		<ul>
			<?php foreach ($items as $post): ?>
				<?php
				$thumbnail = get_the_post_thumbnail($post->ID);
				
				if (!$thumbnail) {
					$thumbnail = get_field('image', $post->ID);
				}
				
				$categories = [];
				
				foreach(get_the_category($post->ID) as $category) {
					$categories[$category->cat_ID] = $category->name;
				}
				
				$thumbnailURL = $thumbnail['sizes']['program-thumbnail'];
				?>
				<li itemscope itemtype="http://schema.org/EducationEvent">
					<?php if(!empty($thumbnailURL)) { ?>
						<a itemprop="url" href="<?= get_permalink($post->ID) ?>">
							<img src="<?= $thumbnailURL; ?>" alt="">
						</a>
					<?php } ?>
					<p>
						<span class="date"><?= current($categories) . ' / ' . date('F d, Y', strtotime($post->post_modified)) ?></span>
						<span class="name"><?= $post->post_title ?></span>
						<a itemprop="url" class="link" href="<?= get_permalink($post->ID) ?>">Read more ></a>
					</p>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</section>
