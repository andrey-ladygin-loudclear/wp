<?php
/**
 * @var $widget GL\Widgets\Paralax
 */

// CHECK https://demo.themegrill.com/ample/
?>

<div class='<?= $widget->getClass(); ?>' id="<?= $id; ?>">
	<div class="paralax clearfix"
		 data-stellar-background-ratio="<?= $widget->getOption('ratio'); ?>"
		 style="background-position: <?= $widget->getOption('background_position'); ?>;background-image: url(<?= $widget->data; ?>)"
	>
		<?php foreach($widget->getChildren() as $child) { ?>
			<?php /** @var $child GL\Widgets\System\Glyph */ ?>
			<?php $child->draw(); ?>
		<?php } ?>
	</div>
</div>


