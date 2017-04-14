<?php
/**
 * @var $widget GL\Widgets\Gallery
 */
?>
<?php use GL\Classes\View; ?>

<?php View::load('Templates/Components/flashMessage', array('widget' => $widget)) ?>

<form action="/wp-admin/admin.php" method="post">
	<?php View::load('Templates/Components/form/head', array('widget' => $widget)) ?>
	<?php View::load('Templates/Components/form/options', array('widget' => $widget)) ?>
	
    <div class="form-inline images-layout well"></div>
    
    <div class="form-group">
        <input class="upload-images-btn button btn btn-info" type="button" value="Add Image" />
        <input type="submit" class="btn btn-success" value="Save">
    </div>
</form>
<script>
	var images = <?= json_encode($widget->getImages()); ?>;
</script>