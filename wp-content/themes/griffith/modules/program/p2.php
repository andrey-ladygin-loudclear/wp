<?php if (isset($module['list_items']) && $module['list_items']): ?>
	<div class="generic-content">
		<ul class="columns">
			<?php foreach ($module['list_items'] as $listItem): ?>
				<li><?php echo $listItem['content'] ?></li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>