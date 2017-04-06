<?php
use GL\Facades\WidgetCompositionFacade;
?>

<?php wp_head(); ?>

<?php
$composition = WidgetCompositionFacade::buildStructure(get_the_ID());
$composition->draw();
?>

<?php wp_footer(); ?>
