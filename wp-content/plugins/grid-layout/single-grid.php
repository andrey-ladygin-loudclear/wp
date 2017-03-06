<style>
    .widget {
        display: inline-block;
        padding: 5px;
        vertical-align: top;
    }
    .widget.w1 { width: 8.33% }
    .widget.w2 { width: 16.66% }
    .widget.w3 { width: 24.99% }
    .widget.w4 { width: 33.33% }
    .widget.w5 { width: 41.66% }
    .widget.w6 { width: 49.99% }
    .widget.w7 { width: 58.33% }
    .widget.w8 { width: 66.66% }
    .widget.w9 { width: 74.99% }
    .widget.w10 { width: 83.33% }
    .widget.w11 { width: 91.66% }
    .widget.w12 { width: 99% }
</style>
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