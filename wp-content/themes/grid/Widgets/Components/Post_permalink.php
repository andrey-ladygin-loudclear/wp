<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_permalink extends Widget {
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
		'text' => array(
			'label' => "Text",
			'size' => 'form-group',
			'type' => 'select',
			'values' => array('Read More', 'Title'),
			'default' => 'Read More',
			
		),
	);
	
	public function getBackendTemplate() {
		return 'callable';
	}
	
	public function draw() {
		View::load('Templates/Frontend/post_permalink', array('widget' => $this));
	}
}