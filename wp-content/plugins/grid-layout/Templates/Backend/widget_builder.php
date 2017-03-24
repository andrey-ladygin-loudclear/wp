<?php use GL\Classes\View; ?>

<h1>Widget Builder</h1>

<input type="hidden" name="post_ID" id="post_ID" value="<?= $widget_id; ?>">
<input type="hidden" name="parent_type" id="parent_type" value="widget_builder">
<script>
	var ajaxurl = "/wp-admin/admin-ajax.php";
</script>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget_id, 'widget_builder');
?>

<?php View::load('Templates/Components/layout/parts', array('widgets' => [
		'Post_content' => 'Post Content',
		'Post_iteration' => 'Post Iteration',
		'Sidebar' => 'Sidebar',
])); ?>

<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>
