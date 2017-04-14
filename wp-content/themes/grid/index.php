<?php
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
	/*.c1 { font-family: 'Conv_MontserratAlternates-Black'; }
	.c2 { font-family: 'Conv_MontserratAlternates-Bold'; }
	.c3 { font-family: 'Conv_MontserratAlternates-Light'; }
	.c4 { font-family: 'Conv_MontserratAlternates-Medium'; }
	.c5 { font-family: 'Conv_Montserrat-Bold'; }
	.c6 { font-family: 'Conv_Montserrat-Medium'; }
	.c7 { font-family: 'Conv_Montserrat-Regular'; }
	.c8 { font-family: 'Conv_Roboto-Bold'; }
	.c9 { font-family: 'Conv_Roboto-Light'; }
	.c10 { font-family: 'Conv_Roboto-Regular'; }*/
</style>

<body <?php body_class(); ?>>
	<div class="main-container <?= get_theme_mod('grid_theme', 'light'); ?>">
		<?php View::load('Templates/Components/front/menu3'); ?>
		
		<!--h3 class="c1">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c2">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c3">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c4">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c5">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c6">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c7">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c8">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c9">Lorem Ipsum dolor set amet color die super </h3>
		<h3 class="c10">Lorem Ipsum dolor set amet color die super </h3-->
		
		<?php
		$composition = WidgetCompositionFacade::buildStructure(NULL, 'page');
		$composition->draw();
		?>
		
		<?php get_footer(); ?>
	</div>
</body>
</html>

