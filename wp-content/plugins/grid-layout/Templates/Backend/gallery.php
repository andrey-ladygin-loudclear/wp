<?php
use GL\Classes\View;
use GL\Helpers\FormHelper;
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
				
				<div class="form-inline">
					<?php $count = 0; ?>
					<?php foreach($widget->options as $key => $value) { ?>
						<?php $count++; ?>
					
						<div class="form-group col-md-6">
							<?php FormHelper::showOptionField($key, $value, $widget->defaults); ?>
						</div>
					
						<?php if($count%2 == 0) { ?>
							</div>
							<div class="form-inline">
						<?php } ?>
					<?php } ?>
				</div>
				
				
			</div>
		</div>
	</div>
	
    <div class="form-inline images-layout well"></div>
    
    <div class="form-group">
        <input class="upload-button button btn btn-info" type="button" value="Add Image" />
        <input type="submit" class="btn btn-success" value="Save">
    </div>
</form>
<script>
	var images = <?= json_encode($widget->getImages()); ?>;
</script>