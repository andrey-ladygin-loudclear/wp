<?php
/**
 * @var $schema GL\Helpers\SchemaHelper
 */
?>

<label for="<?=$schema->name;?>"><?=$schema->label;?></label>
<select class="form-control" name="<?=$schema->name;?>" id="<?=$schema->name;?>">
	<?php foreach($schema->availableValues as $option => $name) { ?>
		<option value="<?= $option; ?>" <?= $schema->value == $option ? 'selected' : ''; ?>><?= $name; ?></option>
	<?php } ?>
</select>
<?php if(!empty($schema->help)) { ?>
	<p class="help-block"><?= $schema->help; ?></p>
<?php } ?>