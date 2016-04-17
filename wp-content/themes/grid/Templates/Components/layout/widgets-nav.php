<?php
use GL\Classes\Config;
use GL\Classes\View;
?>
<div class="btn-group" role="group">
	<?php View::load('Templates/Components/layout/widgets', array('widgets' => Config::$widgets)); ?>
	<?php View::load('Templates/Components/layout/widget_components', array('widgets' => Config::$widget_components)); ?>
	<?php View::load('Templates/Components/layout/wp-widgets'); ?>
	<?php View::load('Templates/Components/layout/post_components', array('widgets' => Config::$post_components)); ?>
</div>