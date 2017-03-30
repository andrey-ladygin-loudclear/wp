<?php
/**
 * @var $widget GL\Widgets\Image
 */
?>

<?php
$id = $widget->getName() . $widget->getId();
//<span class="label label-default"><?= $widget->getName(); </span>
?>
<pre>
	<?php
	print_r($widget);die;
	?>
</pre>
<div class='widget <?= $widget->getName(); ?> col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> <?= $widget->options['classes']; ?>' id="<?= $id; ?>">
	<div class="owl-carousel owl-theme">
		<?php foreach($widget->getImages() as $image) { ?>
			<div class="item"><img src="<?= $image; ?>" /></div>
		<?php } ?>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		$('.widget.gallery .owl-carousel.owl-theme').owlCarousel({
			loop:<?= $widget->options['loop']; ?>,
			margin:<?= $widget->options['margin']; ?>,
			items:<?= $widget->options['items']; ?>,
			autoPlay:<?= $widget->options['autoPlay']; ?>, //Set AutoPlay to 3 seconds
			dots:<?= $widget->options['dots'] ? 'true' : 'false'; ?>,
			nav:<?= $widget->options['nav'] ? 'true' : 'false'; ?>,
			animateOut: '<?= $widget->options['animateOut']; ?>',
			animateIn: '<?= $widget->options['animateIn']; ?>',
			dotData:true
		});
	});
</script>