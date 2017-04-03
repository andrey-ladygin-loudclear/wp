<?php
/**
 * @var $widget GL\Widgets\Wp_query
 * @var $query WP_Query
 */
?>
<div class='<?= $widget->getClass(); ?>'>
	
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	
	<?php
	if($query->have_posts()) {
		while($query->have_posts()) {
			$query->the_post();
			
			foreach($widget->getChildren() as $child) {
				/** @var $child GL\Widgets\System\Glyph */
				$child->draw();
			}
		}
	}
	?>
</div>