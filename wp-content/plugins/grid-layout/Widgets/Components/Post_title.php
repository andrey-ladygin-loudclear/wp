<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_title extends Widget {
	public $schema = array(
		'before' => array(
			'label' => "Before",
			'size' => 'form-group',
			'type' => 'text',
			'default' => "<h1 class='title'>",
		),
		'after' => array(
			'label' => "After",
			'size' => 'form-group',
			'type' => 'text',
			'default' => '</h1>',
		),
	);
	
	public function getBackendTemplate() {
		return 'callable';
	}
	
	public function draw() {
		View::load('Templates/Frontend/post_title', array('widget' => $this));
	}
}