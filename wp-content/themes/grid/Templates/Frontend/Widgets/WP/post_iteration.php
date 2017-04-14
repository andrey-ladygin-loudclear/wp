<?php
/**
* @var $widget GL\Widgets\Post_iteration
* @var $posts array
* @var $before string
* @var $after string
* @var $wp_query WP_Query
*/
?>

<?php if(GL_Grid_Layout::DEBUG) { ?>
	<span class="label label-default"><?= $widget->getName(); ?></span>
<?php } ?>

<?php
	echo $before;
	foreach($widget->getChildren() as $child) {
		/** @var $child GL\Widgets\System\Glyph */
		$child->draw();
	}
	echo $after;
?>
