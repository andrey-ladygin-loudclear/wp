<?php
/**
 * @var $widget GL\Widgets\System\Widget
 */
?>
<?php
use GL\Classes\View;
use GL\Helpers\FormHelper;
use GL\Helpers\SchemaHelper;
?>

<div class="form-group">
	<button class="btn btn-primary options" type="button" data-toggle="collapse" data-target="#collapseInputs" aria-expanded="false" aria-controls="collapseInputs">
		Options
	</button>
	<div class="collapse" id="collapseInputs">
		<div class="well clearfix">
			
			<?php if(empty($hideFullWidget)) { ?>
				<?php View::load('Templates/Components/form/fullWidget', array('widget' => $widget)) ?>
			<?php } ?>
			
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