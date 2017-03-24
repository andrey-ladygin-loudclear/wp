<?php use GL\Classes\View; ?>
<?php global $wp_widget_factory; ?>

<input type="hidden" name="post_ID" id="post_ID" value="<?= $widget_id; ?>">
<input type="hidden" name="parent_type" id="parent_type" value="glyph">
<script>
    var ajaxurl = "/wp-admin/admin-ajax.php";
</script>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget_id, 'glyph');
?>


<?php if(!empty($_GET['showBackButton'])) { ?>
	<div class="btn-group btn-group-widgets">
		<a class="btn btn-default" href="javascript:window.history.back();">Back</a>
	</div>
<?php } ?>

<?php if(get_post_type() == 'grid') { ?>
	<div class="pull-right">
		You can use shortcode to this layout: <span class="label label-default">[gl-grid-tag id="<?= get_the_ID(); ?>"]</span>
	</div>
<?php } ?>

<?php View::load('Templates/Components/layout/widgets', array('widgets' => GL_Grid_Layout::$widgets)); ?>
<?php View::load('Templates/Components/layout/wp-widgets', array('widgets' => $wp_widget_factory->widgets)); ?>
<?php View::load('Templates/Components/layout/custom', array('widgets' => [])); ?>


<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Components/layout/popup'); ?>