<?php use GL\Classes\View;
use GL\Helpers\FormHelper;
use GL\Helpers\SchemaHelper; ?>

<h1>Widget Builder</h1>

<form action="/wp-admin/admin.php" method="post">
	<input type="hidden" name="action" value="gl_save_widget_action">
	<input type="hidden" name="widget-id" value="<?= $widget->getId(); ?>">
	<input type="hidden" name="parent_type" id="parent_type" value="glyph">
	
	<div class="form-group">
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInputs" aria-expanded="false" aria-controls="collapseInputs">
			Options
		</button>
		<div class="collapse" id="collapseInputs">
			<div class="well clearfix">
				<?php View::input('alias', 'Widget Name', $widget->alias); ?>
				
				<?php if(!empty($widget->schema)) { ?>
					<?php foreach($widget->schema as $key => $field) { ?>
						<?php
						$value = !empty($widget->options[$key]) ? $widget->options[$key] : '';
						$schema = new SchemaHelper($key, $field, $value);
						?>
		
						<div class="form-group <?= $schema->size; ?>">
							<?php FormHelper::showSchemaInput($schema); ?>
						</div>
					<?php } ?>
				<?php } ?>
	
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Save">
				</div>
	
			</div>
		</div>
	</div>
</form>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget->getId(), 'glyph');
?>

<?php View::load('Templates/Components/layout/widgets-nav', array('hideCustom' => TRUE)); ?>
<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>

