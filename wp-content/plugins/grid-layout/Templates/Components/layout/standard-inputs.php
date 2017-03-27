<div class="form-group">
	<label for="alias">Widget Alias</label>
	<input type="text" name="options[alias]" class="form-control" id="alias" value="<?= !empty($options['alias']) ? $options['alias'] : ''; ?>">
</div>
<div class="form-group">
	<label for="classes">Additional Classes</label>
	<input type="text" name="options[classes]" class="form-control" id="classes" value="<?= !empty($options['classes']) ? $options['classes'] : ''; ?>">
</div>
<div class="form-group">
	<label for="full_widget">Full Widget</label>
	<select class="form-control" name="options[full_widget]" id="full_widget">
		<option value="0" <?= empty($options['full_widget']) ? 'selected' : ''; ?>>No</option>
		<option value="1" <?= !empty($options['full_widget']) ? 'selected' : ''; ?>>Yes</option>
	</select>
</div>