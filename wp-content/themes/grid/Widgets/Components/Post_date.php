<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_date extends Widget {
	public $schema = array(
		'format' => array(
			'label' => "Format",
			'size' => 'form-group',
			'type' => 'text',
			'help' => 'PHP date format defaults to the date_format option if not specified.',
			'default' => "",
		),
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
	
	public function __construct()
	{
		parent::__construct();
		$this->schema['format']['default'] = get_option('date_format');
	}
	
	public function getBackendTemplate() {
		return 'callable';
	}
	
	public function draw() {
		View::load('Templates/Frontend/Widgets/WP/post_date', array(
			'widget' => $this
		));
	}
}