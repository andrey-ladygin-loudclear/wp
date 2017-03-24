<div class="btn-group btn-group-widgets">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Your Widgets <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<?php
		foreach($widgets as $name => $widget) { ?>
			<li><a href="javascript:void(0);" onclick="Layout.add('', {name:'<?=$name;?>'});"><?=$widget->name;?></a></li>
		<?php } ?>
		<li><a href="javascript:void(0);" onclick="Layout.add('Custom');">Build Your Widget</a></li>
	</ul>
</div>