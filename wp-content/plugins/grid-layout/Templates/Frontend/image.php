<div class='widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> well' style='border: 1px solid;min-height: <?= $widget->getHeight()*60; ?>px;'>
    <?php foreach($widget->images as $image) { ?>
        <img src="<?= $image; ?>">
    <?php } ?>
</div>