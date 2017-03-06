<?php if (isset($module['programs']) && $module['programs']): ?>
	<section itemscope itemtype="http://schema.org/EducationalOrganization" class="programs module">
		<div>
			<h2><?php echo $module['title'] ?></h2>
			<ul>
				<?php foreach ($module['programs'] as $program): ?>
					<?php
					$post = $program['program'];
					$thumbnail = $program['thumbnail'];
					if (!$thumbnail) {
						$thumbnail = get_field('image', $program['program']->ID);
					}
					$thumbnailURL = $thumbnail['sizes']['program-thumbnail'];
					?>
					<li itemscope itemtype="http://schema.org/EducationEvent">
						<a itemprop="url" href="<?php echo get_permalink($post->ID) ?>">
							<div class="image" style="background-image: url(<?php echo $thumbnailURL ?>)"></div>
							<h3 itemprop="name"><?php echo $post->post_title ?></h3>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</section>
<?php endif ?>
