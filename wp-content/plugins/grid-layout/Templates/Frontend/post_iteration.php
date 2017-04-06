<?php
/**
 * @var $widget GL\Widgets\Post_iteration
 * @var $posts array
 * @var $before string
 * @var $after string
 * @var $wp_query WP_Query
 */
?>
<?php
global $post;
global $wp_query;
?>
<?php if(!empty($showMainContainer)) { ?>
	<div class='<?= $widget->getClass(); ?>'>
<?php } ?>

	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
	<?php
		if($wp_query->have_posts()) {
			while($wp_query->have_posts()) {
				$wp_query->the_post();
				
				echo $before;
				foreach($widget->getChildren() as $child) {
					/** @var $child GL\Widgets\System\Glyph */
					$child->draw();
				}
				echo $after;
			}
		}
	?>

<?php if(!empty($showMainContainer)) { ?>
	</div>
<?php } ?>