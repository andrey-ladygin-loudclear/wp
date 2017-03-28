<div class="widget-container">
	<?php $widget->draw(); ?>
</div>
<div class="widget-elements"></div>
<?php
$scss = new \GL\Classes\Scss();
$scss->loadDir('calendar');
$scss->selectCurrentStyles('v1');
$scss->loadStyles();
$scss->replaceWidgetId('calendar-13');
$scss->compile();
?>
<script>
	(function($) {

	})(jQuery);
</script>