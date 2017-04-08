<?php
/**
 * @var $schema GL\Helpers\SchemaHelper
 */
?>

<?php
$values = (array) $schema->value;
?>

<label for="<?=$schema->name;?>"><?=$schema->label;?></label>
<select class="form-control" multiple name="<?=$schema->name;?>" id="<?=$schema->name;?>">
	<?php foreach($schema->availableValues as $option => $name) { ?>
		<option value="<?= $option; ?>" <?= in_array($option, $values) ? 'selected' : ''; ?>><?= $name; ?></option>
	<?php } ?>
</select>
<?php if(!empty($schema->help)) { ?>
	<p class="help-block"><?= $schema->help; ?></p>
<?php } ?>