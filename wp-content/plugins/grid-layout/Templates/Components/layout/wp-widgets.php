<?php global $wp_widget_factory; ?>

<div class="btn-group btn-group-widgets">
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Add Wordpress Widget <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<?php
		foreach($wp_widget_factory->widgets as $name => $widget) { ?>
			<li><a href="javascript:void(0);" onclick="Layout.add('<?=$name;?>');"><?=$widget->name;?></a></li>
		<?php } ?>
	</ul>
</div>