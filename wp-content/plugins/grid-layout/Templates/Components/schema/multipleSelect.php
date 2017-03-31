<?php
/**
 * @var $schema GL\Helpers\SchemaHelper
 */
?>
	
	<label for="<?=$schema->name;?>"><?=$schema->label;?></label>
<select class="form-control" multiple name="<?=$schema->name;?>" id="<?=$schema->name;?>">
	<?php foreach($schema->availableValues as $option => $name) { ?>
		<option value="<?= $option; ?>" <?= in_array($option, $schema->value) ? 'selected' : ''; ?>><?= $name; ?></option>
	<?php } ?>
</select>