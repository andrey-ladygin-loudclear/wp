<?php get_header() ?>

<?php
$image		= get_field('image', get_the_ID());
$widgets	= array('cta1', 'testimonials', 'events');


$tags = [];
foreach(wp_get_post_tags(get_the_ID()) as $tag) {
	$tags[] = $tag->term_id;
}
$args = array('posts_per_page'=>1,'post_type'=>'post','post__not_in'=>array(get_the_ID()),'post_status'=>'publish');
if($tags) {
	$args['tag__in'] = $tags;
}
$items = get_posts($args);
$item = !empty($items[0]) ? $items[0] : array();

?>
    <div class="categories mobile">
        <ul>
            <li class="active"><a data-cat="">All</a></li>
            <?php foreach(get_categories() as $category) { ?>
                <li><a href="javascript:void(0);" data-cat="<?= $category->cat_ID; ?>"><?= $category->name; ?></a></li>
            <?php } ?>
        </ul>
    </div>
	<div class="module gallery">
		<p class="desktop"><?php include __DIR__ . '/components/breadcrumbs.php' ?></p>
		
		
		<h2 class="mobile">Griffith News</h2>
		<div class="create-date mobile"><?php echo get_the_date('F d, Y'); ?></div>
		
		<h2 class="desktop">Griffith News</h2>
		<h2 class="mobile"><?= get_field('subnav_title', get_the_ID()); ?></h2>
		<div class="content desktop">
			<?php the_content(); ?>
		</div>
		<ul>
			<li>
				<img src="<?php echo $image['sizes']['program'] ?>" width="100%" alt="">
				<?php if(!empty($item)) { ?>
				<div class="thumbnail-content">
					<?php
					
					$category = '';
					foreach(get_the_category($item->ID) as $category) {
						$category = $category->name;
						break;
					}
					
					?>
					<p class="create-date desktop"><?php echo $category . " / " . date('F d, Y', strtotime($item->post_date)); ?></p>
					<h3 class="title"><?= $item->post_title; ?><a href="<?= $item->guid; ?>"></a></h3>
				</div>
				<?php } ?>
			</li>
		</ul>
		<div class="content mobile">
			<?php the_content(); ?>
		</div>
		<!--div class="heading">
			<?php
			$sub_title = get_field('top_form_header', get_the_ID());
			$sub_dest = get_field('top_form_description', get_the_ID());
			?>
			<h2><?= $sub_title; ?></h2>
			<div class="content"><?= $sub_dest; ?></div>
		</div-->
	</div>
	<!--div class="gray-layout news">
		<main class="main-content">
			<?php if($image): ?>
				<header style="background-image: url(<?php echo $image['sizes']['program'] ?>)">
					<h1><?php the_title() ?></h1>
				</header>
			<?php else: ?>
				<h1><?php the_title() ?></h1>
			<?php endif ?>
			
			<?php include __DIR__ . '/sub-nav.php' ?>
			
			
			
			<?php include __DIR__ . '/../modules/index.php' ?>
		</main>
	</div-->
	
	<div class="white-layout">
		<div class="categories desktop">
			<ul>
				<li class="active"><a data-cat="">All</a></li>
				<?php foreach(get_categories() as $category) { ?>
					<li><a href="javascript:void(0);" data-cat="<?= $category->cat_ID; ?>"><?= $category->name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		
		<section itemscope itemtype="http://schema.org/EducationalOrganization" class="news module">
			<div class="news-categories news-cat0" data-cat="0">
				<ul class="news-template"></ul>
				
				<p class="add-more">
					<img src="/wp-admin/images/wpspin_light-2x.gif" class="preloader" style="display: none">
					<button class="upload-more-news">Read More</button>
				</p>
			</div>
			<?php foreach(get_categories() as $k=>$category) { ?>
				<div class="news-categories news-cat<?= $category->cat_ID; ?>" data-cat="<?= $category->cat_ID; ?>" style="display:none;">
					<ul class="news-template"></ul>
					
					<p class="add-more">
						<img src="/wp-admin/images/wpspin_light-2x.gif" class="preloader" style="display: none">
						<button class="upload-more-news">Read More</button>
					</p>
				</div>
			<?php } ?>
		</section>
	</div>

	<div class="gray-layout">
		<main class="main-content">
			<?php include __DIR__ . '/widgets/widget/cta3-static.php' ?>
		</main>
	</div>
<?php get_footer() ?>