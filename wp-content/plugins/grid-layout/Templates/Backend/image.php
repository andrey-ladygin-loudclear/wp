<form action="/wp-admin/admin.php" method="post">
    <input type="hidden" name="action" value="gl_save_widget_action">
    <input type="hidden" name="widget-name" value="<?= $widget_name; ?>">
    <input type="hidden" name="widget-id" value="<?= $widget_id; ?>">
    <input type="text" name="src">
    
    <input id="image-url" type="text" name="image" />
    <input id="upload-button" type="button" class="button" value="Upload Image" />
    
    <input type="submit" value="Save">
</form>