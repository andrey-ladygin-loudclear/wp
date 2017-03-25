<div class="form-group">
    <label for="<?=$name;?>"><?=$label;?></label>
	<select class="form-control" multiple name="<?=$name;?>" id="<?=$name;?>">
		<?php foreach($options as $option => $name) { ?>
			<option value="<?= $option; ?>" <?= in_array($option, $values) ? 'selected' : ''; ?>><?= $name; ?></option>
		<?php } ?>
	</select>
</div>