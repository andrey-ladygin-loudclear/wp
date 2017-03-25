<?php

namespace GL\Classes;

Class Actions {
	
	public function check_actions() {
		if(empty($_GET['action'])) {
			return;
		}
		
		if($_GET['action'] == 'gl_edit_widget_action') {
			do_action('gl_edit_widget_action');
		}
		
		if($_POST['action'] == 'gl_save_widget_action') {
			do_action('gl_save_widget_action');
		}
		
		if($_GET['action'] == 'gl_delete_template_action') {
			do_action('gl_delete_template_action');
		}
		if($_GET['action'] == 'gl_update_template_action') {
			do_action('gl_update_template_action');
		}
		if($_GET['action'] == 'gl_create_template_action') {
			do_action('gl_create_template_action');
		}
	}
	
	public function delete_template() {
		$post_id = $_GET['post_id'];
		$template = new \GL\Classes\Templates($post_id);
		$template->delete();
		wp_redirect(wp_get_referer());
		exit;
	}
	
	public function update_template() {
		$post_id = $_GET['post_id'];
		$template = new \GL\Classes\Templates($post_id);
		$template->update();
		wp_redirect(wp_get_referer());
		exit;
	}
	
	public function create_template() {
		$post_id = $_GET['post_id'];
		$template = new \GL\Classes\Templates($post_id);
		$template->create();
		wp_redirect(wp_get_referer());
		exit;
	}
}