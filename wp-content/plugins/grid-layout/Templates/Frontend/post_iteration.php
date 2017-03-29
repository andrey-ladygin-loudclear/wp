<?php
/**
 * @var $widget GL\Widgets\Text
 * @var $query WP_Query
 */
?>
<div class='container-fluid widget col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> <?= GL_Grid_Layout::DEBUG ? 'well' : ''; ?>'>
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	<?php
	if($query->have_posts()) {
		while($query->have_posts()) {
			$query->the_post();
			
			foreach($widget->getChildren() as $child) {
				$child->draw();
			}
		}
	}
	?>
</div>