<?php use GL\Classes\View; ?>
<h1>Settings</h1>

<div>
	
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#options" aria-controls="options" role="tab" data-toggle="tab">Options</a></li>
		<li role="presentation"><a href="#templates" aria-controls="templates" role="tab" data-toggle="tab">Templates</a></li>
	</ul>
	
	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="options"><?php View::load('Templates/Settings/options'); ?></div>
		<div role="tabpanel" class="tab-pane" id="templates"><?php View::load('Templates/Settings/templates'); ?></div>
	</div>

</div>
