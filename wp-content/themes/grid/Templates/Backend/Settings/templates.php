<?php
/**
 * @var $widget GL\Widgets\Block
 */
?>

<?php use GL\Classes\View; ?>


	<input type="hidden" name="action" value="gl_save_widget_action">
	<input type="hidden" name="widget-name" value="">
	<input type="hidden" name="widget-id" value="">
	<input type="hidden" name="parent_type" id="parent_type" value="<?= $post_type; ?>">

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid(NULL, $post_type);
?>

<?php View::load('Templates/Backend/components/parts/widgets-navigation'); ?>
<?php View::load('Templates/Backend/components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Backend/components/parts/layout-popup'); ?>

