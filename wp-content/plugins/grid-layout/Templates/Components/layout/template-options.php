<?php $template = new \GL\Classes\Templates($post_id); ?>

<?php if($template->template_exist()) { ?>
	
	<?php if($template->check_checkusm()) { ?>
		<p>Template for this post already exists <a href="/wp-admin/admin.php?action=gl_delete_template_action&post_id=<?= $post_id; ?>" class="label label-danger">Delete</a></p>
	<?php } else { ?>
		<p>You should update template for this post <a href="/wp-admin/admin.php?action=gl_update_template_action&post_id=<?= $post_id; ?>" class="label label-warning">Update</a></p>
	<?php } ?>
	
<?php } else { ?>
	<p>You can create template for this post <a href="/wp-admin/admin.php?action=gl_create_template_action&post_id=<?= $post_id; ?>" class="label label-primary">Create</a></p>
<?php } ?>
