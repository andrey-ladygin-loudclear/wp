<?php

$categories = [];

foreach(get_the_category($post->ID) as $category) {
	$categories[$category->cat_ID] = $category->name;
}

$category = current($categories);

?>

<div class="gray-layout">
	
	<main class="main-content">
		<div class="widgeted news-article">
			<div class="content">
				
				<div class="create-date desktop"><?php echo $category . " / " . get_the_date('F d, Y'); ?></div>
				<?php include __DIR__ . '/news-breadcrumbs.php' ?>
				<?php
				$image		= get_field('image', get_the_ID());
				$widgets	= array('cta1', 'testimonials', 'events');
				?>
				<h2 class="page-title mobile">Griffith News</h2>
				<div class="create-date mobile"><?php echo $category . " / " . get_the_date('F d, Y'); ?></div>
				
				<h1 class="page-title desktop">Griffith News</h1>
				
				<?php if($image): ?>
					<header style="background-image: url(<?php echo $image['sizes']['program'] ?>)">
						<h1 class="article-title"><?php the_title() ?></h1>
					</header>
				<?php else: ?>
					<h1 class="article-title"><?php the_title() ?></h1>
				<?php endif ?>
				
				
				
				<?php include __DIR__ . '/sub-nav.php' ?>
				<?php include __DIR__ . '/../modules/index.php' ?>
				<?php echo do_shortcode('[wp_social_sharing social_options="twitter, facebook, linkedin, googleplus"]'); ?>
			</div>
			<?php include __DIR__ . '/../widgets/custom.php' ?>
		</div>
	</main>
</div>
<main class="main-content">
	<?php include __DIR__ . '/../widgets/widget/related-news.php' ?>
</main>
<div class="gray-layout">
	<?php include __DIR__ . '/../widgets/widget/cta3-static.php' ?>
</div>
<div class="mobile-widgets">
	<?php include __DIR__ . '/../widgets/custom.php' ?>
</div>

