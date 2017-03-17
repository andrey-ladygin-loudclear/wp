<?php use GL\Classes\View; ?>
<form action="/wp-admin/admin.php" method="post">
    <input type="hidden" name="action" value="gl_save_widget_action">
    <input type="hidden" name="widget-name" value="<?= $widget_name; ?>">
    <input type="hidden" name="widget-id" value="<?= $widget_id; ?>">
    <?php View::padding(); ?>
    <?php View::text('text', 'text', 'Text', $widget->text, 6); ?>
    <input type="submit" class="btn btn-success" value="Save">
</form>