<?php
use GL\Classes\View;
use GL\Facades\WidgetCompositionFacade;
?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<body <?php body_class(); ?>>

<?php View::load('Templates/Components/front/menu'); ?>

<?php
$composition = WidgetCompositionFacade::buildStructure(get_the_ID());
$composition->draw();
?>

<?php get_footer(); ?>
</body>
</html>

