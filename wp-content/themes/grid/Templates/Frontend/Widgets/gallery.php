<?php
/**
 * @var $widget GL\Widgets\Gallery
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
		<?php foreach($widget->getImages() as $image) { ?>
			<div class="item"><img src="<?= $image; ?>" /></div>
		<?php } ?>
	</div>
</div>
<script>
	window.onload = function() {
		jQuery(document).ready(function ($) {
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
	}
</script>