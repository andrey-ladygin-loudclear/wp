<?php
	$ratings	 = get_posts(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'how_we_rate',
		'post_status'		=> 'publish'
	));
	$features = get_posts(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'key_message',
		'post_status'		=> 'publish'
	));
?>
<section class="overview module">
	<div>
		<div class="intro">
			<div class="header">
				<h1><?php echo $module['title'] ?></h1>
				<?php echo $module['content'] ?>
			</div>
			<section class="tabbed cycle">
				<header>
					<div>
						<h2>How<br /> we rate</h2>
						<?php if (count($ratings) > 1): ?>
							<nav class="dots">
								<ol>
									<?php foreach ($ratings as $index => $rating): ?><li<?php if ($index == 0): ?> class="active"<?php endif ?>>
										<a href="#ratings-item-<?php echo $index + 1 ?>" title="View item <?php echo $index + 1 ?>" aria-label="View item <?php echo $index + 1 ?>"></a>
									</li><?php endforeach ?>
								</ol>
							</nav>
						<?php endif ?>
					</div>
				</header><ol>
					<?php foreach ($ratings as $index => $rating): ?>
						<?php
							$content			= get_field('content', $rating->ID);
							$highlightedContent	= get_field('highlight_text', $rating->ID);
							if ($highlightedContent) $content = str_replace($highlightedContent, '<strong>' . $highlightedContent . '</strong>', $content);
						?>
						<li<?php if ($index == 0): ?> class="active"<?php endif ?> id="ratings-item-<?php echo $index + 1 ?>">
							<?php echo $content ?>
						</li>
					<?php endforeach ?>
				</ol>
			</section>
		</div>
		<ul class="accordion">
			<?php foreach ($features as $index => $feature): ?>
				<li id="feature-<?php echo $index ?>">
					<a class="toggle <?php echo get_field('icon', $feature->ID)->post_name ?>-icon" href="#feature-<?php echo $index ?>"><h3><?php echo $feature->post_title ?></h3></a>
					<div class="content">
						<p><?php echo get_field('content', $feature->ID) ?></p>
					</div>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</section>
