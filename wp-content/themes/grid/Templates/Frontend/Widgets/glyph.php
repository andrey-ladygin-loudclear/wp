<?php
/**
 * @var $widget GL\Widgets\Block
 */
?>

<?php
$style = "style='";

if(!empty($widget->getOption('background'))) {
	$color = $widget->getOption('background');
	$style .= "background-color: {$color};";
}
if(!empty($widget->getOption('border'))) {
	$border = $widget->getOption('border');
	$style .= "border: {$border};";
}
if(!empty($widget->getOption('padding'))) {
	$border = $widget->getOption('padding');
	$style .= "padding: {$border};";
}
if(!empty($widget->getOption('margin'))) {
	$border = $widget->getOption('margin');
	$style .= "margin: {$border};";
}

$style .= "'";
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