
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<h1>GRID</h1>
<ul>
    <li>ADD html inputs to view class</li>
</ul>
<?php
include WP_PLUGIN_DIR . "/grid-layout/Classes/Composition.php";
include WP_PLUGIN_DIR . "/grid-layout/Classes/Structure.php";

$widgets = \GL\Structure::getWidgets(get_the_ID());
$composition = new \GL\Composition();

foreach($widgets as $widget) {
    $composition->insert($widget);
}

$composition->draw();
?>
