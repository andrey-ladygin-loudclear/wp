<div class="container-fluid widget-container">
	<?php $widget->draw(); ?>
</div>

<div class="styles container-fluid">
	<div class="well pull-left <?= empty($widget->style) ? 'active' : ''; ?>" data-name="">Null</div>
	<?php foreach($scss->getStylesList() as $style) { ?>
		<div class="well pull-left <?= $widget->style == $style ? 'active' : ''; ?>" data-name="<?= $style; ?>" ><?= $style; ?></div>
	<?php } ?>
</div>

<div class="styles container-fluid">
	<input type="hidden" id="styles-name" value="<?= $widget->getName(); ?>">
	<input type="hidden" id="styles-dir" value="<?= $widget->getStylesDir(); ?>">
	<input type="hidden" id="widget-id-attribute" value="<?= $widget->getIdAttribute(); ?>">
	<input type="hidden" id="widget-id" value="<?= $widget->getId(); ?>">
	<button class="btn -btn-success" id="save-styles">Save</button>
</div>

<style id="widget_styles"></style>