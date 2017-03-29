<div class="container-fluid widget-container">
	<?php $widget->draw(); ?>
</div>

<div class="styles container-fluid">
	<?php foreach($scss->getStylesList() as $style) { ?>
		<div class="well pull-left" data-name="<?= $style; ?>"><?= $style; ?></div>
	<?php } ?>
</div>

<div class="styles container-fluid">
	<input type="hidden" id="styles-dir" value="<?= $widget->name; ?>">
	<input type="hidden" id="widget-id-attribute" value="<?= $widget->getIdAttribute(); ?>">
	<input type="hidden" id="widget-id" value="<?= $widget->getId(); ?>">
	<button class="btn -btn-success" id="save-styles">Save</button>
</div>

<style id="widget_styles"></style>
<?php
//$scss = new \GL\Classes\Scss();
//$scss->loadDir('calendar');
//$scss->selectCurrentStyles('v1');
//$scss->loadStyles();
//$scss->replaceWidgetId('calendar-13');
//$scss->compile();
?>