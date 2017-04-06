<?php use GL\Classes\View;

if($widget->getWidth() == 12) { ?>
    <?php View::select('full_width', 'Full Widget', array('0'=>'No', '1'=>'Yes'), $widget->full_width); ?>
<?php } else { ?>
    <input type="hidden" name="full_width" value="0">
<?php } ?>