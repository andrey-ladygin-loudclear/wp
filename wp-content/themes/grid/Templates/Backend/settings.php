<?php use GL\Classes\View; ?>
<h1>Settings</h1>

<?php $type = !empty($_GET['type']) ? $_GET['type'] : NULL; ?>

<div>
	
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="<?= $type ? '' : 'active'; ?>"><a href="#options" aria-controls="options" role="tab" data-toggle="tab">Options</a></li>
		<li role="presentation" class="<?= $type ? 'active' : ''; ?>"><a href="#templates" aria-controls="templates" role="tab" data-toggle="tab">Templates</a></li>
	</ul>
	
	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane <?= $type ? '' : 'active'; ?>" id="options"><?php View::load('Templates/Settings/options'); ?></div>
		<div role="tabpanel" class="tab-pane <?= $type ? 'active' : ''; ?>" id="templates"><?php View::load('Templates/Settings/templates'); ?></div>
	</div>

</div>
