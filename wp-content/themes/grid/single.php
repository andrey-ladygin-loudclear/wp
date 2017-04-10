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
die('123123312');
$composition = WidgetCompositionFacade::buildStructure(NULL, 'single');
$composition->draw();
?>

<?php get_footer(); ?>
</body>
</html>

