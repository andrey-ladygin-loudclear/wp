<?php
/**
 * @var $widget GL\Widgets\Text
 * @var $func mixed
 */
?>

<div class='<?= $widget->getClass(); ?>'>
	<?php if(GL_Grid_Layout::DEBUG) { ?>
		<span class="label label-default"><?= $widget->getName(); ?></span>
	<?php } ?>
	<?php call_user_func($func); ?>
</div>