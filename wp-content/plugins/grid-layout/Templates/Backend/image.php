<form action="/wp-admin/admin.php" method="post">
    <input type="hidden" name="action" value="gl_save_widget_action">
    <input type="hidden" name="widget-name" value="<?= $widget_name; ?>">
    <input type="hidden" name="widget-id" value="<?= $widget_id; ?>">
    
    <div class="form-inline images-layout"></div>
    
    <div class="form-group">
        <input class="upload-button button" type="button" value="Add Image" />
        <input type="submit" class="btn btn-success" value="Save">
    </div>
</form>
<script>
	var images = <?= json_encode($widget->images); ?>;
</script>