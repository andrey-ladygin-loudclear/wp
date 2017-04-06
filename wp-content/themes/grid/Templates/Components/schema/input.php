<?php
/**
 * @var $schema GL\Helpers\SchemaHelper
 */
?>

<label for="<?=$schema->name;?>"><?=$schema->label;?></label>
<input type="text" name="<?=$schema->name;?>" class="form-control" id="<?=$schema->name;?>" placeholder="<?=$schema->placeholder;?>" value="<?=$schema->value;?>">
<?php if(!empty($schema->help)) { ?>
	<p class="help-block"><?= $schema->help; ?></p>
<?php } ?>