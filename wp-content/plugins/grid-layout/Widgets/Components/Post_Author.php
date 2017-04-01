<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_Author extends Widget {
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
	
	public function getBackendTemplate() {
		return 'callable';
	}
	
	public function draw() {
		View::load('Templates/Frontend/post_author', array('widget' => $this));
	}
}