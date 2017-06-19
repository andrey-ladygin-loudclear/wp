<?php use GL\Classes\View; ?>
<h1>Templates</h1>
<form action="">
	<input type="hidden" name="post_type" value="<?= $post_type; ?>">
</form>
<?php View::load('Templates/Components/layout/widgets-nav'); ?>
<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Components/layout/popup'); ?>