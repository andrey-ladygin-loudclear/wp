<?php
/**
 * @var $widget GL\Widgets\Custom
 */
?>
<?php use GL\Classes\View; ?>

<h1>Widget Builder</h1>

<?php View::load('Templates/Backend/components/parts/flashMessage', array('widget' => $widget)) ?>

<form action="/wp-admin/admin.php" method="post">
	<?php View::load('Templates/Backend/components/parts/head', array('widget' => $widget)) ?>
	<?php View::load('Templates/Backend/components/parts/options', array('widget' => $widget)) ?>
	
	<div class="form-group">
		<input type="submit" class="btn btn-success" value="Save">
	</div>
</form>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget->getId(), 'glyph');
?>

<?php View::load('Templates/Backend/components/parts/widgets-navigation', array('hideCustom' => TRUE)); ?>
<?php View::load('Templates/Backend/components/grid', array('widgets' => $widgets)); ?>

