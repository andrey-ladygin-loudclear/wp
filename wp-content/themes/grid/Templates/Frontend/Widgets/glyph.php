<?php
/**
 * @var $widget GL\Widgets\Block
 */
?>

<?php
$style = '';
if(!empty($widget->getOption('background'))) {
	$color = $widget->getOption('background');
	$style = "style='background-color: {$color}'";
}
?>

<div class='<?= $widget->getClass(); ?>' <?= $style; ?>>

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