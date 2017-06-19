<?php


namespace GL\Widgets\Specified;

use GL\Classes\View;
use GL\Widgets\System\Glyph;
use GL\Widgets\System\Widget;

class Latest_posts extends Glyph {
	public $schema = array(
		'title' => array(
			'label' => "Title",
			'size' => 'form-group',
			'type' => 'text',
			'default' => "LATEST NEWS",
		),
		'description' => array(
			'label' => "Description",
			'size' => 'form-group',
			'type' => 'text',
			'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
		),
	);
	
	/*
	 * Title and description should create like separate widget
	 * **/
	
	public function draw() {
		View::load("Templates/Frontend/Widgets/Specified/latest_posts", array('widget' => $this));
	}
}