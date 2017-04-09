<?php
/**
 * @var $widget GL\Widgets\System\Widget
 */
?>

<?php use GL\Classes\View; ?>

<?php View::load('Templates/Components/flashMessage', array('widget' => $widget)) ?>

<form action="/wp-admin/admin.php" method="post">
	<?php View::load('Templates/Components/form/head', array('widget' => $widget)) ?>
	<?php View::load('Templates/Components/form/options', array('widget' => $widget, 'hideFullWidget' => TRUE)) ?>
	
	<div class="form-group">
		<input type="submit" class="btn btn-success" value="Save">
	</div>
</form>