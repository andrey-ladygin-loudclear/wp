<?php use GL\Classes\View; ?>
<h1>Templates</h1>
<form action="">
	<input type="hidden" name="post_type" value="<?= $post_type; ?>">
</form>

<?php View::load('Templates/Backend/components/parts/widgets-navigation'); ?>
<?php View::load('Templates/Backend/components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Backend/components/parts/layout-popup'); ?>