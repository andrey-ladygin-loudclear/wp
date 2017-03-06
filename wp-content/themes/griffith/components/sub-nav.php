<?php if (!is_search()): ?>
	<?php
		$post		= get_post(get_the_ID());
		$parentPost	= get_post($post->post_parent);
		$activeId	= ($post->post_parent) ? $post->post_parent : get_the_ID();
		$children	= get_pages('child_of=' . $activeId . '&parent=' . $activeId);
	?>
	<?php if ($children): ?>
		<nav class="sub-nav">
			<ol>
				<?php
					$subNavTitle = get_field('subnav_title', $activeId);
					if (!$subNavTitle) $subNavTitle = $parentPost->post_title;
				?>
				<li<?php if (get_the_ID() === $parentPost->ID): ?> class="active"<?php endif ?>>
					<a href="<?php echo get_permalink($activeId) ?>"><?php echo $subNavTitle ?></a>
				</li>
				<?php foreach ($children as $childPage): ?>
					<?php
						$subNavTitle = get_field('subnav_title', $childPage->ID);
						if (!$subNavTitle) $subNavTitle = $childPage->post_title;
					?>
					<li<?php if (get_the_ID() === $childPage->ID): ?> class="active"<?php endif ?>>
						<a href="<?php echo get_permalink($childPage->ID) ?>"><?php echo $subNavTitle ?></a>
					</li>
				<?php endforeach ?>
			</ol>
		</nav>
	<?php endif ?>
<?php endif ?>