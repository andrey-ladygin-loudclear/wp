<?php
/**
 * @var $widget GL\Widgets\WP
 */
?>
<?php use GL\Classes\View; ?>

<?php View::load('Templates/Backend/components/parts/flashMessage', array('widget' => $widget)) ?>

<form action="/wp-admin/admin.php" method="post">
	<?php View::load('Templates/Backend/components/parts/head', array('widget' => $widget)) ?>

    <?php $widget->dummy->form($widget->options); ?>

    <input type="hidden" name="wp-widget-field-name" value="<?= $widget->dummy->get_field_name(''); ?>">

	<button type="submit" class="btn btn-success">Save</button>
</form>