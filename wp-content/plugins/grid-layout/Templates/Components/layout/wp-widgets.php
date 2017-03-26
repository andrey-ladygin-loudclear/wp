<?php global $wp_widget_factory; ?>

<div class="btn-group btn-group-widgets">
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Add Wordpress Widget <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<?php
		foreach($widgets as $name => $widget) { ?>
			<li><a href="javascript:void(0);" onclick="Layout.add('WP', {name:'<?=$name;?>'});"><?=$widget->name;?></a></li>
		<?php } ?>
	</ul>
</div>