<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_Author extends Widget {
	public $schema = [
		'loop' => 'bool',
		'margin' => 'int',
		'items' => 'int',
		'autoPlay' => 'int',
		'dots' => 'bool',
		'nav' => 'bool',
		'animateOut' => 'slideOutDown',
		'animateIn' => 'slideOutUp',
	];
	
	public function getBackendTemplate() {
		return 'callable';
	}
	
	public function draw() {
		View::load('Templates/Frontend/post_author', array('widget' => $this));
	}
}