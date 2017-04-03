<?php
/**
 * @var $widget GL\Widgets\Background_image
 */
?>
<div
	class='<?= $widget->getClass(); ?>'
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