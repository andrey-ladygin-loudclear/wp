<?php

namespace GL\Classes;

class Templates {
	
	public function page() {
		Assets::addDefaults();
		Assets::enqueue();
		$post_type = !empty($_GET['post_type']) ? $_GET['post_type'] : 'post';
		View::load('Templates/Settings/templates', array('post_type' => $post_type));
	}
	
}