<?php
	$image		= get_field('image', get_the_ID());
	$widgets	= get_field('widgets', get_the_ID());

		if('event' == get_post_type()) {
			$postMeta 	= get_post_meta(get_the_ID());
			$itemScope 	= 'itemscope itemtype="http://schema.org/EducationEvent"';
			$itemName 	= 'itemprop="name"';
			$eventDate 	= $postMeta['event_date'][0];
			$eventName 	= $postMeta['course_name'][0];

		}
?>
<main class="main-content" <?php echo ('event' == get_post_type()) ? $itemScope : ''; ?>>
	<?php if($image): ?>
		<header style="background-image: url(<?php echo $image['sizes']['program'] ?>)">
			<h1 ><?php the_title() ?></h1>
		</header>
	<?php else: ?>
		<h1 <?php echo ('event' == get_post_type()) ? $itemName : ''; ?>><?php the_title() ?></h1>
		<?php
			if('event' == get_post_type()) {
			?>
				<h2 class='event-details'>
				<span  itemprop="name"><?php echo $eventName; ?></span>
				<span  itemprop="startDate"><?php echo date('Y/m/d', strtotime($eventDate)); ?></span>
				</h2>
			<?php
			}
		?>
	<?php endif ?>
	<?php if ($widgets && reset($widgets)): ?>
		<div class="widgeted">
			<div class="content">
				<?php include __DIR__ . '/sub-nav.php' ?>
				<?php include __DIR__ . '/../modules/index.php' ?>
			</div>
			<?php include __DIR__ . '/../widgets/index.php' ?>
		</div>
	<?php else: ?>
		<?php include __DIR__ . '/sub-nav.php' ?>
		<?php include __DIR__ . '/../modules/index.php' ?>
	<?php endif ?>
</main>
