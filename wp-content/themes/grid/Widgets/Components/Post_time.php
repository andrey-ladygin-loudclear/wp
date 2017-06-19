<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_time extends Widget {
	public $schema = array(
		'format' => array(
			'label' => "Format",
			'size' => 'form-group',
			'type' => 'text',
			'help' => 'PHP time format defaults to the time_format option if not specified.',
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
		$this->schema['format']['default'] = get_option('time_format');
	}
	
	public function getBackendTemplate() {
		return 'callable';
	}
	public function draw() {
		View::load('Templates/Frontend/Widgets/WP/post_time', array(
			'widget' => $this,
		));
	}
}