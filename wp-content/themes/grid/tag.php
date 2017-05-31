<?php
use GL\Classes\Structure;
use GL\Classes\View;
use GL\Facades\WidgetCompositionFacade;
?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<style>
    body .main-container{
        font-family: '<?php echo get_theme_mod('grid_theme_fonts', 'Conv_Montserrat-Medium'); ?>';
    }
</style>

<body <?php body_class(); ?>>
<div class="main-container <?= get_theme_mod('grid_theme', 'light'); ?>">
    <?php View::load('Templates/Frontend/Components/menu'); ?>

    <?php
    $composition = WidgetCompositionFacade::buildStructure(get_the_ID(), 'tag');
    $composition->draw();
    ?>

    <?php get_footer(); ?>
</div>
</body>
</html>

