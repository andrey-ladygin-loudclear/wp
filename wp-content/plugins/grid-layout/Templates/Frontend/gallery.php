<?php
/**
 * @var $widget GL\Widgets\Image
 */
?>

<?php
$id = $widget->getName() . $widget->getId();
//<span class="label label-default"><?= $widget->getName(); </span>
?>

<div class='widget owl-carousel owl-theme <?= $widget->getName(); ?> col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> ' id="<?= $id; ?>">
	
	<?php foreach($widget->images as $image) { ?>
		<div class="item"><img src="<?= $image; ?>" /></div>
	<?php } ?>
	
</div>