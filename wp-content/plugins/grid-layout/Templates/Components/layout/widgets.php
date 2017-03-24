<div class="btn-group btn-group-widgets">
	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Add Widget <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<?php foreach($widgets as $name => $title) { ?>
			<li><a href="javascript:void(0);" onclick="Layout.add('<?=$name;?>');"><?=$title;?></a></li>
		<?php } ?>
	</ul>
</div>
