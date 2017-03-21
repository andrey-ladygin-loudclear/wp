<form action="/wp-admin/admin.php" method="post">
    <input type="hidden" name="action" value="gl_save_widget_action">
    <input type="hidden" name="widget-name" value="<?= $widget_name; ?>">
    <input type="hidden" name="widget-id" value="<?= $widget_id; ?>">
    
    <input type="hidden" name="src">
    <input class="upload-button button" type="button" value="Upload Image" />
    
    <input type="submit" class="btn btn-success" value="Save">
</form>