<form action="/wp-admin/admin.php" method="post">
	<input type="hidden" name="action" value="gl_save_widget_action">
	<input type="hidden" name="widget-name" value="<?= $widget->name; ?>">
	<input type="hidden" name="widget-id" value="<?= $widget->getId(); ?>">

	<?php
	$class = $widget->name;
	$dummy = new $class();
	$settings = $dummy->widget_options;
	$options = get_option($dummy->option_name);
	
	if(!empty($options[2])) {
		$options = $options[2];
	}
	
	if(!empty($options)) {
		foreach($options as $name => $value) { ?>
			<div class="form-group">
				<label for="<?= $name; ?>"><?= ucfirst(str_replace('_', ' ', $name)); ?></label>
				<input type="text" class="form-control" name="options[<?= $name; ?>]" id="<?= $name; ?>" value='<?= !empty($widget->options[$name]) ? $widget->options[$name] : $value; ?>'>
			</div>
		<?php } ?>
	<?php } ?>
	
	<?php /* foreach($dummy->widget_options as $name => $value) { ?>
		<div class="form-group">
			<label for="<?= $name; ?>"><?= ucfirst(str_replace('_', ' ', $name)); ?></label>
			<input type="text" class="form-control" name="instance[<?= $name; ?>]" id="<?= $name; ?>" value='<?= !empty($widget->instance[$name]) ? $widget->instance[$name] : $value; ?>'>
		</div>
	<?php } */ ?>
	
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