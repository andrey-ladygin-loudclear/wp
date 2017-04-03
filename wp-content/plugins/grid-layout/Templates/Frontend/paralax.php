
<div class='widget <?= $widget->getName(); ?> col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?>' id="<?= $id; ?>">
    <div class=""
         data-parallax="scroll"
         data-image-src="<?= $widget->data; ?>"
         style="height: 500px;position: relative;"
    >
        <?php foreach($widget->getChildren() as $child) { ?>
            <?php $child->draw(); ?>
        <?php } ?>
    </div>
</div>