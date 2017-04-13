<?php
use GL\Classes\View;
use GL\Facades\WidgetCompositionFacade;
the_post();
?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<body <?php body_class(); ?>>

<?php View::load('Templates/Components/front/menu'); ?>

<?php
$composition = WidgetCompositionFacade::buildStructure(NULL, 'single');
$composition->draw();
?>

<?php get_footer(); ?>
</body>
</html>

