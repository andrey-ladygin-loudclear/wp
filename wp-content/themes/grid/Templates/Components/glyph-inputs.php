<?php
/**
 * @var $widget_id int
 * @var $alias string
 */
use GL\Classes\View;

?>

<input type="hidden" name="action" value="gl_save_widget_action">
<input type="hidden" name="post_ID" id="post_ID" value="<?= $widget_id; ?>">
<input type="hidden" name="parent_type" id="parent_type" value="glyph">
<?php View::input('alias', 'Widget Name', $alias); ?>