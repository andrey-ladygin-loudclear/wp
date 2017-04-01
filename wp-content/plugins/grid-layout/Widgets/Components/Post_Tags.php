<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_Tags extends Widget {
	public $schema = array(
		'before' => array(
			'label' => "Before",
			'size' => 'form-group',
			'type' => 'text',
			'default' => 'Tags:',
			'help' => 'Text to display before the actual tags are displayed. Defaults to Tags:',
		),
		'sep' => array(
			'label' => "Separator",
			'size' => 'form-group',
			'type' => 'text',
			'default' => ',',
			'help' => 'Text or character to display between each tag link. The default is a comma (,) between each tag.',
		),
		'after' => array(
			'label' => "After",
			'size' => 'form-group',
			'type' => 'text',
			'help' => 'Text to display after the last tag. The default is to display nothing.',
		),
	);
	
	public function getBackendTemplate() {
		return 'callable';
	}
	
	
	public function draw() {
		View::load('Templates/Frontend/post_tags', array(
			'widget' => $this,
		));
	}
}