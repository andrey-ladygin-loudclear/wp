<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_content extends Widget {
	public $schema = array(
		'before' => array(
			'label' => "Before",
			'size' => 'form-group',
			'type' => 'text',
		),
		'after' => array(
			'label' => "After",
			'size' => 'form-group',
			'type' => 'text',
		),
	);
	
	//https://developer.wordpress.org/reference/functions/the_content/
	public function getBackendTemplate() {
		return 'callable';
	}
	
	public function draw() {
		View::load('Templates/Frontend/Widgets/WP/post_content', array('widget' => $this));
	}
}