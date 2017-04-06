<?php
/**
 * @var $widget GL\Widgets\Block
 */
?>

<div class='<?= $widget->getClass(); ?>'>

	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
	<?php
		foreach($widget->getChildren() as $child) {
			/** @var $child GL\Widgets\System\Glyph */
			$child->draw();
		}
	?>
</div>