<input type="hidden" name="post_ID" id="post_ID" value="<?= $widget_id; ?>">
<input type="hidden" name="parent_type" id="parent_type" value="glyph">
<?php
global $wpdb;
$widgets = $wpdb->get_results("SELECT * FROM wp_gl_grid WHERE parent_id = {$widget_id} AND parent_type = 'glyph';", OBJECT );

//include "../edit.php";
?>

