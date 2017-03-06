<section class="primary cta widget">
	<h2><?php echo GriffithSettings::$options['widgets']['cta1']['title'] ?></h2>
	<p><?php echo GriffithSettings::$options['widgets']['cta1']['content'] ?></p>
	<?php $link = GriffithSettings::$options['widgets']['cta1']['link'] ?>
	<a class="button" href="<?php echo $link ?>"<?php if (strpos($link, 'http') === 0): ?> target="_blank"<?php endif ?>><?php echo GriffithSettings::$options['widgets']['cta1']['link_label'] ?></a>
</section>