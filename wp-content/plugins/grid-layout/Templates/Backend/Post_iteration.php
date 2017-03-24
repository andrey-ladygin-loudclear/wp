<?php use GL\Classes\View; ?>

<h1>Widget Builder</h1>

<input type="hidden" name="post_ID" id="post_ID" value="<?= $widget_id; ?>">
<input type="hidden" name="parent_type" id="parent_type" value="glyph">
<script>
	var ajaxurl = "/wp-admin/admin-ajax.php";
</script>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget_id, 'glyph');
?>

<?php View::load('Templates/Components/layout/parts', array('widgets' => GL_Grid_Layout::$widget_components)); ?>

<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>

