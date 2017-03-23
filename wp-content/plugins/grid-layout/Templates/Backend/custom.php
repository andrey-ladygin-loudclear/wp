<input type="hidden" name="post_ID" id="post_ID" value="<?= $widget_id; ?>">
<input type="hidden" name="parent_type" id="parent_type" value="custom">
<script>
    var ajaxurl = "/wp-admin/admin-ajax.php";
</script>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget_id, 'custom');
GL\Classes\View::load('Templates/Backend/widget_builder', array(
	'widgets' => $widgets
));
?>

