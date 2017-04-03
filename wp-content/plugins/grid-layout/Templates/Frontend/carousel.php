<?php
/**
 * @var $widget GL\Widgets\Carousel
 */
?>

<?php
$id = $widget->getName() . $widget->getId();
?>
<div class='<?= $widget->getClass(); ?>' id="<?= $id; ?>">
	
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
	<div class="owl-carousel owl-theme">
		<?php foreach($widget->getChildren() as $child) { ?>
			<?php /** @var $child GL\Widgets\System\Glyph */ ?>
			<?php if(count($widget->getChildren()) > 1) { ?>
				<div class="item">
					<?php $child->draw(); ?>
				</div>
			<?php } else { ?>
				<?php $child->draw('<div class="item">', '</div>', FALSE); ?>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		$('#<?= $id; ?> .owl-carousel.owl-theme').owlCarousel({
			loop:<?= $widget->getOption('loop'); ?>,
			margin:<?= $widget->getOption('margin'); ?>,
			items:<?= $widget->getOption('items'); ?>,
			autoplay:<?= $widget->getOption('autoplay'); ?>,
			dots:<?= $widget->getOption('dots'); ?>,
			nav:<?= $widget->getOption('nav'); ?>,
			animateout: '<?= $widget->getOption('animateOut'); ?>',
			animatein: '<?= $widget->getOption('animateIn'); ?>',
			autoplayTimeout:<?= $widget->getOption('autoplayTimeout'); ?>,
			autoplayHoverPause:<?= $widget->getOption('autoplayHoverPause'); ?>,
			dotdata: true
		});
	});
</script>