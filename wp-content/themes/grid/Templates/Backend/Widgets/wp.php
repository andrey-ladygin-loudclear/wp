<?php
/**
 * @var $widget GL\Widgets\WP
 */
?>
<?php use GL\Classes\View; ?>

<?php View::load('Templates/Components/flashMessage', array('widget' => $widget)) ?>

<form action="/wp-admin/admin.php" method="post">
	<?php View::load('Templates/Components/form/head', array('widget' => $widget)) ?>

    <?php $widget->dummy->form($widget->options); ?>

	<div class="form-group">
		<label for="before_widget">Before Widget</label>
		<input type="text" class="form-control" name="args[before_widget]" id="before_widget" value='<?= !empty($widget->args['before_widget']) ? $widget->args['before_widget'] : '<div class="widget %s">'; ?>'>
	</div>
	<div class="form-group">
		<label for="after_widget">After Widget</label>
		<input type="text" class="form-control" name="args[after_widget]" id="after_widget" value='<?= !empty($widget->args['after_widget']) ? $widget->args['after_widget'] : '</div>'; ?>'>
	</div>
	<div class="form-group">
		<label for="before_title">Before Title</label>
		<input type="text" class="form-control" name="args[before_title]" id="before_title" value='<?= !empty($widget->args['before_title']) ? $widget->args['before_title'] : '<h2 class="widgettitle">'; ?>'>
	</div>
	<div class="form-group">
		<label for="after_title">After Title</label>
		<input type="text" class="form-control" name="args[after_title]" id="after_title" value='<?= !empty($widget->args['after_title']) ? $widget->args['after_title'] : '</h2>'; ?>'>
	</div>
	<button type="submit" class="btn btn-success">Save</button>
</form>