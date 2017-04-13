<?php
use GL\Classes\View;
use GL\Facades\WidgetCompositionFacade;
?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<style>
	body {
		font-family: '<?php echo get_theme_mod('grid_theme_fonts', 'Conv_Montserrat-Medium'); ?>'!important;
	}
</style>

<body <?php body_class(); ?>>
	<div class="main-container <?= get_theme_mod('grid_header_navbar', 'light'); ?>">
		<?php View::load('Templates/Components/front/menu3'); ?>
		
		<?php
		$composition = WidgetCompositionFacade::buildStructure(NULL, 'page');
		$composition->draw();
		?>
		
		<?php get_footer(); ?>
	</div>
</body>
</html>

