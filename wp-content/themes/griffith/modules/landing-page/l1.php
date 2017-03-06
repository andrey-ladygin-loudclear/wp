<main class="landing main-content">
	<div>
		<?php $image = get_field('image', get_the_ID()) ?>
		<figure style="background-image: url(<?php echo $module['image']['sizes']['landing-page'] ?>)">
			<img src="<?php echo $module['image']['sizes']['landing-page'] ?>"<?php if ($image['alt']): ?> alt="<?php echo $image['alt'] ?>"<?php endif ?> />
		</figure>
		<div class="content">
			<div class="header">
				<h2><?php echo $module['title'] ?></h2>
				<?php if (isset($module['closing_date']) || $module['date_title']): ?>
					<section class="notice">
						<h3><?php echo ($module['date_title']) ? $module['date_title'] : 'Apps close'; ?></h3>
						<?php if (isset($module['closing_date']) && $module['closing_date']): ?>
							<p><strong><?php echo $module['closing_date'] ?></strong> <?php echo $module['closing_date_description'] ?></p>
						<?php endif ?>
					</section>
				<?php endif ?>
			</div>
			<p><?php echo $module['content'] ?></p>
			<?php
				$learnMoreLink = get_post(GriffithSettings::$options['anchor_links']['open_enquiry_form']);
				if ($learnMoreLink) $learnMoreLink = $learnMoreLink->post_name;
			?>
			<a class="cta" href="#<?php echo $learnMoreLink ?>">learn more</a>
		</div>
	</div>
</main>