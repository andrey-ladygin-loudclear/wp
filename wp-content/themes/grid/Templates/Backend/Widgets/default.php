<?php
/**
 * @var $widget GL\Widgets\System\BasicTemplate
 */
use GL\Classes\View;

?>

<?php View::load('Templates/Backend/components/parts/flashMessage', array('widget' => $widget)) ?>

<form action="/wp-admin/admin.php" method="post">
	<?php View::load('Templates/Backend/components/parts/head', array('widget' => $widget)) ?>
    <?php View::load('Templates/Backend/components/parts/options', array('widget' => $widget)) ?>
    <input type="submit" class="btn btn-success" value="Save">
</form>