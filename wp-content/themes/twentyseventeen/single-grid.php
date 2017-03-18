<?php
use GL\Classes\Composition;
use GL\Classes\Structure;
?>

<?php wp_head(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<h1><?php the_title(); ?></h1>
<?php
//include WP_PLUGIN_DIR . "/grid-layout/Classes/Composition.php";
//include WP_PLUGIN_DIR . "/grid-layout/Classes/Structure.php";

$widgets = Structure::getWidgets(get_the_ID());
$composition = new Composition();

foreach($widgets as $widget) {
    $composition->insert($widget);
}

$composition->draw();
?>
<?php wp_footer(); ?>
