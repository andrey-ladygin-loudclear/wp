<?php
/**
 * @var $widget GL\Widgets\Custom
 */
?>
<?php use GL\Classes\View; ?>

<h1>Widget Builder</h1>

<form action="/wp-admin/admin.php" method="post">
	<?php View::load('templates/Components/form/head', array('widget' => $widget)) ?>
	<?php View::load('templates/Components/form/options', array('widget' => $widget)) ?>
	
	<div class="form-group">
		<input type="submit" class="btn btn-success" value="Save">
	</div>
</form>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget->getId(), 'glyph');
?>

<?php View::load('Templates/Components/layout/widgets-nav', array('hideCustom' => TRUE)); ?>
<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>

