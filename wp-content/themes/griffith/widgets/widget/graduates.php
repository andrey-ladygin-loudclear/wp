<?php
	$postPerPage = GriffithSettings::$options['widgets']['graduates']['num_visible_items'];
	if (!$postPerPage) $postPerPage = -1;
	$items = get_posts(array(
		'posts_per_page'	=> $postPerPage,
		'post_type'			=> 'graduate',
		'post_status'		=> 'publish'
	));
?>
<section class="list widget">
	<h2>Graduates</h2>
	<div class="tabbed sliding cycle">
		<ol>
			<?php foreach ($items as $index => $item): ?><li class="item<?php if ($index == 0): ?> active<?php endif ?>" id="graduates-widget-item-<?php echo $index + 1 ?>">
				<a href="<?php echo get_permalink($item->ID) ?>">
					<?php $image = get_field('graduate_photo', $item->ID) ?>
					<img src="<?php echo $image['sizes']['widget'] ?>"<?php if ($image['alt']): ?> alt="<?php echo $image['alt'] ?>"<?php endif ?> />
					<h3><?php echo $item->post_title ?></h3>
					<p><?php echo get_field('blurb', $item->ID) ?></p>
				</a>
			</li><?php endforeach ?>
		</ol>
		<?php if (count($items) > 1): ?>
			<nav class="dots">
				<ol>
					<?php foreach ($items as $index => $item): ?><li<?php if ($index == 0): ?> class="active"<?php endif ?>>
						<a href="#graduates-widget-item-<?php echo $index + 1 ?>" title="View item <?php echo $index + 1 ?>" aria-label="View item <?php echo $index + 1 ?>"></a>
					</li><?php endforeach ?>
				</ol>
			</nav>
		<?php endif ?>
	</div>
</section>