<?php
/**
 * @var $widget GL\Widgets\Text
 * @var $query WP_Query
 */

global $post;
?>
<?php if(!empty($showMainContainer)) { ?>
	<div class='container-fluid widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> <?= GL_Grid_Layout::DEBUG ? 'well' : ''; ?>'>
<?php } ?>

	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
	<?php
		foreach($posts as $post) {
			setup_postdata($post);
		
			echo $before;
			foreach($widget->getChildren() as $child) {
				$child->draw();
			}
			echo $after;
		};
	?>

<?php if(!empty($showMainContainer)) { ?>
	</div>
<?php } ?>