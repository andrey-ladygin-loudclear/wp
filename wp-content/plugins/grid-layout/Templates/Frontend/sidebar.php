<?php
/**
 * @var $widget GL\Widgets\Components\Sidebar
 */
?>

<div class='<?= $widget->getClass(); ?>'>
	
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
	<?php get_sidebar(); ?>
</div>