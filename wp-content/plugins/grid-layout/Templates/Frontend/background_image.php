<div
	class='container-fluid widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> <?= GL_Grid_Layout::DEBUG ? 'well' : ''; ?>'
	style="background-image: url(<?= $widget->data; ?>);background-size: <?= $widget->options['background']; ?>"
>
<?php if(GL_Grid_Layout::DEBUG) { ?>
	<span class="label label-default"><?= $widget->getName(); ?></span>
<?php } ?>
<?php
    foreach($widget->getChildren() as $child) {
        $child->draw();
    }
?>
</div>