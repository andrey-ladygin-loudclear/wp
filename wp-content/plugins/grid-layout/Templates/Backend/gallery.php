<?php
use GL\Classes\View;
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
				
				<?php if($widget->getWidth() == 12) { ?>
					<?php View::select('full_width', 'Full Widget', array('0'=>'No', '1'=>'Yes'), $widget->full_width); ?>
				<?php } else { ?>
					<input type="hidden" name="full_width" value="0">
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
	
    <div class="form-inline images-layout well"></div>
    
    <div class="form-group">
        <input class="upload-images-btn button btn btn-info" type="button" value="Add Image" />
        <input type="submit" class="btn btn-success" value="Save">
    </div>
</form>
<script>
	var images = <?= json_encode($widget->getImages()); ?>;
</script>