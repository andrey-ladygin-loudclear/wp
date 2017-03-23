<h1>Builder</h1>


<div class="btn-group btn-group-widgets">
	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Add Widget <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<?php foreach(GL_Grid_Layout::$widgets as $name => $title) { ?>
			<li><a href="javascript:void(0);" onclick="Layout.add('<?=$name;?>');"><?=$title;?></a></li>
		<?php } ?>
	</ul>
</div>

<div class="gridster ready">
	<input type="hidden" name="page_id" id="page_id" value="">
	<div class="gridster-widgets grid-stack"></div>
</div>

<!-- Scripts -->
<script>
	var structure = <?php echo json_encode($widgets); ?>;
</script>
