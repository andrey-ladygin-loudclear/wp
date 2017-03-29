<?php use GL\Classes\View; ?>


	<input type="hidden" name="action" value="gl_save_widget_action">
	<input type="hidden" name="post_ID" id="post_ID" value="<?= $widget->getId(); ?>">
	<input type="hidden" name="parent_type" id="parent_type" value="glyph">
	<div class="well">
		<?php View::input('alias', 'Widget Name', $widget->alias); ?>
	</div>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget->getId(), 'glyph');
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

<?php View::load('Templates/Components/layout/widgets-nav'); ?>
<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Components/layout/popup'); ?>