<?php if (isset($module['specifications']) && $module['specifications']): ?>
	<table class="info-table">
		<?php foreach ($module['specifications'] as $row): ?>
			<tr>
				<th><?php echo $row['field'] ?></th>
				<td><?php echo $row['value'] ?></td>
			</tr>
		<?php endforeach ?>
	</table>
<?php endif ?>