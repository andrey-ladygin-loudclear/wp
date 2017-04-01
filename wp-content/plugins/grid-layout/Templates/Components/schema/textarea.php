<?php
/**
 * @var $schema GL\Helpers\SchemaHelper
 */
?>

<label for="<?=$schema->name;?>"><?=$schema->label;?></label>
<textarea id="<?=$schema->name;?>" class="form-control wysiwyg" rows="<?=$schema->rows;?>" name="<?=$schema->name;?>"><?=$schema->value;?></textarea>
<?php if(!empty($schema->help)) { ?>
	<p class="help-block"><?= $schema->help; ?></p>
<?php } ?>