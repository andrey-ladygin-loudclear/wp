<?php
/**
 * @var $widget GL\Widgets\Carousel
 */
?>
<?php use GL\Classes\View; ?>

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

<?php View::load('Templates/Backend/components/parts/widgets-navigation'); ?>
<?php View::load('Templates/Backend/components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Backend/components/parts/layout-popup'); ?>
