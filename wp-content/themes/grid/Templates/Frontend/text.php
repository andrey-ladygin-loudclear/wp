<?php
/**
 * @var $widget GL\Widgets\Text
 */
?>

<div class='<?= $widget->getClass(); ?>'>
	
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
<?= $widget->getText(); ?>
</div>