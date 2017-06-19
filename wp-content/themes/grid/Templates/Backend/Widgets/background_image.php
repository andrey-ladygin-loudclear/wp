<?php
/**
 * @var $widget GL\Widgets\Background_image
 */
?>

<?php use GL\Classes\View; ?>

<?php View::load('Templates/Backend/components/parts/flashMessage', array('widget' => $widget)) ?>

<form action="/wp-admin/admin.php" method="post">
    <?php View::load('Templates/Backend/components/parts/head', array('widget' => $widget)) ?>
    <?php View::load('Templates/Backend/components/parts/options', array('widget' => $widget)) ?>

    <div class="form-inline image-layout well">
        <?php if(!empty($widget->data)) { ?>
            <img src="<?= $widget->data; ?>" alt="">
            <input type="hidden" name="data" value="<?= $widget->data; ?>">
        <?php } ?>
    </div>

    <div class="form-group">
        <input class="upload-one-image-btn button btn btn-info" type="button" value="Add Image" />
        <input type="submit" class="btn btn-success" value="Save">
    </div>
</form>

<?php
$layout = new \GL\Classes\Layout();
$widgets = $layout->getGrid($widget->getId(), 'glyph');
?>

<?php View::load('Templates/Components/layout/widgets-nav'); ?>
<?php View::load('Templates/Components/grid', array('widgets' => $widgets)); ?>
<?php View::load('Templates/Components/layout/popup'); ?>
