<?php
/**
 * @var $widget GL\Widgets\Block
 */
?>

<?php use GL\Classes\View; ?>

<?php View::load('Templates/Components/flashMessage', array('widget' => $widget)) ?>

<form action="/wp-admin/admin.php" method="post">
	<?php View::load('Templates/Components/form/head', array('widget' => $widget)) ?>
	<?php View::load('Templates/Components/form/options', array('widget' => $widget)) ?>
	<div class="form-group">
		<input type="submit" class="btn btn-success" value="Save">
	</div>
</form>


<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget->getId(), 'glyph');
?>

<?php if(!empty($_GET['showBackButton'])) { ?>
	<div class="btn-group btn-group-widgets">
		<a class="btn btn-default" href="javascript:window.history.back();">Back</a>
	</div>
<?php } ?>

<?php View::load('Templates/Backend/components/widgets-navigation'); ?>
<?php View::load('Templates/Backend/components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Backend/components/layout-popup'); ?>