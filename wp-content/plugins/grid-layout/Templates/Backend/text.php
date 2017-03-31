<?php
/**
 * @var $widget GL\Widgets\Text
 */
?>

<form action="/wp-admin/admin.php" method="post">
    <input type="hidden" name="action" value="gl_save_widget_action">
    <input type="hidden" name="widget-name" value="<?= $widget->getName(); ?>">
    <input type="hidden" name="widget-id" value="<?= $widget->getId(); ?>">
    <div class="form-group">
    	<?php wp_editor($widget->getText(), 'text'); ?>
    </div>
    <input type="submit" class="btn btn-success" value="Save">
</form>