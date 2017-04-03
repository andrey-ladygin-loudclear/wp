<?php
/**
 * @var $widget GL\Widgets\Background_image
 */
?>

<?php
use GL\Classes\View;
use GL\Helpers\FormHelper;
use GL\Helpers\SchemaHelper;

?>
<form action="/wp-admin/admin.php" method="post">
	<?php View::load('templates/Components/form/head', array('widget' => $widget)) ?>
	
	<div class="form-group">
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInputs" aria-expanded="false" aria-controls="collapseInputs">
			Options
		</button>
		<div class="collapse" id="collapseInputs">
			<div class="well clearfix">
				
				<?php View::load('templates/Components/form/fullWidget', array('widget' => $widget)) ?>
				
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
	
	<div class="form-inline image-layout well">
		<?php if(!empty($widget->data)) { ?>
			<img src="<?= $widget->data; ?>" alt="">
			<input type="hidden" name="data" value="<?= $widget->data; ?>">
		<?php } ?>
	</div>
	
	<div class="form-group">
		<input class="upload-one-image-btn button btn btn-info" type="button" value="Add Image" />
		<input type="submit" class="btn btn-success" value="Save">
	</div>
</form>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget->getId(), 'glyph');
?>

<?php View::load('Templates/Components/layout/widgets-nav'); ?>
<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Components/layout/popup'); ?>
