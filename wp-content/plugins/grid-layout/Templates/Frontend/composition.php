<?php
/**
 * @var $widgets array
 */
?>

<div class="container-fluid">

<?php
foreach($widgets as $widget) {
    $widget->draw();
}
?>

</div>