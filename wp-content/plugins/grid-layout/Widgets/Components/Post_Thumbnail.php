<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_thumbnail extends Widget {
	public $schema = array(
		'before' => array(
			'label' => "Before",
			'size' => 'form-group',
			'type' => 'text',
		),
		'show' => array(
			'label' => "Show like as:",
			'size' => 'form-group',
			'values' => array(
				'link' => 'Image with link to the post',
				'image' => 'Only image',
			),
			'type' => 'select',
		),
		'after' => array(
			'label' => "After",
			'size' => 'form-group',
			'type' => 'text',
		),
		'width' => array(
			'label' => "Width",
			'size' => 'form-group',
			'type' => 'text',
			'default' => '0',
			'help' => 'The post thumbnail width in pixels.',
		),
		'height' => array(
			'label' => "Height",
			'size' => 'form-group',
			'type' => 'text',
			'default' => '0',
			'help' => 'The post thumbnail height in pixels.',
		),
		'crop' => array(
			'label' => "Crop",
			'size' => 'form-group',
			'type' => 'bool',
			'default' => '0',
			'help' => ' Crop the image or not. False - Soft proportional crop mode ; True - Hard crop mode.',
		),
	);
	
	public function getBackendTemplate() {
		return 'callable';
	}
	
	public function draw() {
		View::load('Templates/Frontend/post_thumbnail', array('widget' => $this));
	}
}