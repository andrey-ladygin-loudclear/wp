<?php

namespace GL\Classes;

class Templates {
	
	public function page() {
		$post_type = !empty($_GET['post_type']) ? $_GET['post_type'] : 'post';
		View::load('Templates/Backend/templates', array('post_type' => $post_type));
	}
	
}