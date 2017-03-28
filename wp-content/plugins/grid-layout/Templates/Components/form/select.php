
<label for="<?=$name;?>"><?=$label;?></label>
<select class="form-control" name="<?=$name;?>" id="<?=$name;?>">
	<option value="">Select</option>
	<?php foreach($options as $option => $name) { ?>
		<option value="<?= $option; ?>" <?= $value == $option ? 'selected' : ''; ?>><?= $name; ?></option>
	<?php } ?>
</select>