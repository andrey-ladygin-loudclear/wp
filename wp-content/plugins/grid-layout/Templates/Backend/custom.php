<?php use GL\Classes\View; ?>

<h1>Widget Builder</h1>

<?php View::load('Templates/Components/glyph-inputs', array(
	'widget_id' => $widget->getId(),
	'alias' => ''
)); ?>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget->getId(), 'glyph');
?>

<?php View::load('Templates/Components/layout/parts', array('widgets' => GL_Grid_Layout::$widget_components)); ?>

<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>

