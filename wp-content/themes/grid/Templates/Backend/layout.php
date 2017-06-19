<?php use GL\Classes\View; ?>

<h1>Layout</h1>

<?php if(!empty($_GET['showBackButton'])) { ?>
	<div class="btn-group btn-group-widgets">
		<a class="btn btn-default" href="javascript:window.history.back();">Back</a>
	</div>
<?php } ?>

<?php if(get_post_type() == 'grid') { ?>
<div class="pull-right">
    You can use shortcode to this layout: <span class="label label-default">[gl-grid-tag id="<?= get_the_ID(); ?>"]</span>
</div>
<?php } ?>

<?php View::load('Templates/Backend/components/widgets-navigation'); ?>
<?php View::load('Templates/Backend/components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Backend/components/layout-popup'); ?>
