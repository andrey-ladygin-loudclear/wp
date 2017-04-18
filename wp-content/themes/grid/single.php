<?php
use GL\Classes\View;
use GL\Facades\WidgetCompositionFacade;
the_post();
?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<body <?php body_class(); ?>>

    <div class="main-container <?= get_theme_mod('grid_theme', 'light'); ?>">
        <?php View::load('Templates/Frontend/Components/menu3'); ?>
        
        <?php
        $composition = WidgetCompositionFacade::buildStructure(NULL, 'single');
        $composition->draw();
        ?>
        
        <?php get_footer(); ?>
    </div>
</body>
</html>

