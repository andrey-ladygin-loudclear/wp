<?php
use GL\Helpers\FormHelper;
use GL\Helpers\SchemaHelper;

?>
<form action="/wp-admin/admin.php" method="post">
	<input type="hidden" name="action" value="gl_save_widget_action">
	<input type="hidden" name="widget-name" value="<?= $widget->getName(); ?>">
	<input type="hidden" name="widget-id" value="<?= $widget->getId(); ?>">
	
	<div class="form-group">
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInputs" aria-expanded="false" aria-controls="collapseInputs">
			Options
		</button>
		<div class="collapse" id="collapseInputs">
			<div class="well clearfix">
				<?php foreach($widget->schema as $key => $field) { ?>
					<?php
					$value = !empty($widget->options[$key]) ? $widget->options[$key] : '';
					$schema = new SchemaHelper($key, $field, $value);
					?>
					<div class="form-group <?= $schema->size; ?>">
						<?php FormHelper::showSchemaInput($schema); ?>
					</div>
				<?php } ?>
			
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-success" value="Save">
	</div>
</form>