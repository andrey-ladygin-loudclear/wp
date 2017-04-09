<?php
use GL\Classes\View;
?>
<div class="btn-group" role="group">
	<?php View::load('Templates/Components/layout/widgets', array('widgets' => GL_Grid_Layout::$widgets)); ?>
	<?php View::load('Templates/Components/layout/builder', array('widgets' => GL_Grid_Layout::$builder)); ?>
	<?php View::load('Templates/Components/layout/wp-widgets'); ?>
	<?php View::load('Templates/Components/layout/parts', array('widgets' => GL_Grid_Layout::$widget_components)); ?>
</div>