<?php
/**
 * @var $widget GL\Widgets\Paralax
 */

// CHECK https://demo.themegrill.com/ample/
?>

<div class='<?= $widget->getClass(); ?>' id="<?= $id; ?>">
	<div class="paralax clearfix" data-stellar-background-ratio="0.5" style="background-position: 50% 0px;background-image: url(https://ianlunn.co.uk/plugins/jquery-parallax/images/secondBG.jpg)">
		<?php foreach($widget->getChildren() as $child) { ?>
			<?php /** @var $child GL\Widgets\System\Glyph */ ?>
			<?php $child->draw(); ?>
		<?php } ?>
	</div>
</div>


