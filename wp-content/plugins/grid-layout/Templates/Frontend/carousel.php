<?php
/**
 * @var $widget GL\Widgets\Image
 */
?>

<?php

$id = $widget->getName() . $widget->getId();
//<span class="label label-default"><?= $widget->getName(); </span>
?>
<div class='widget <?= $widget->getName(); ?> col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> <?= $widget->options['classes']; ?>' id="<?= $id; ?>">
	<div class="owl-carousel owl-theme">
		<?php
		$childrens = $widget->getChildren();
//		echo '<pre>';
//		print_r(current($childrens));
//		die;
		if(count($childrens) > 1) {
			foreach($widget->getChildren() as $child) { ?>
				<div class="item">
					<?php $child->draw(); ?>
				</div>
		<?php }
		} elseif(count($childrens)) {
			current($childrens)->draw();
		}
		?>
		
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		$('#<?= $id; ?> .owl-carousel.owl-theme').owlCarousel({
			loop:<?= $widget->options['loop']; ?>,
			margin:<?= $widget->options['margin']; ?>,
			items:<?= $widget->options['items']; ?>,
			autoplay:<?= $widget->options['autoplay'] ? 'true' : 'false'; ?>,
			dots:<?= $widget->options['dots'] ? 'true' : 'false'; ?>,
			nav:<?= $widget->options['nav'] ? 'true' : 'false'; ?>,
			animateout: '<?= $widget->options['animateOut']; ?>',
			animatein: '<?= $widget->options['animateIn']; ?>',
			autoplayTimeout:<?= $widget->options['autoplayTimeout']; ?>,
			autoplayHoverPause:<?= $widget->options['autoplayHoverPause'] ? 'true' : 'false'; ?>,
			dotdata: true
		});
	});
</script>