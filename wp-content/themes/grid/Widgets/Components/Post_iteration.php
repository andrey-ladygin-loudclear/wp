<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Helpers\ObjectHelper;
use GL\Widgets\System\Glyph;

class Post_iteration extends Glyph {
	public $schema = array(
		'before' => array(
			'label' => "Before",
			'size' => 'form-group',
			'type' => 'text',
			'default' => "<div class='row'>",
		),
		'after' => array(
			'label' => "After",
			'size' => 'form-group',
			'type' => 'text',
			'default' => '</div>',
		),
	);
	
	public function draw($before = '', $after = '', $showMainContainer = TRUE) {
		while (have_posts()) {
			the_post();
			View::load('Templates/Frontend/post_iteration', array(
				'widget' => $this,
				'before' => $before,
				'after' => $after,
				'showMainContainer' => $showMainContainer,
			));
		}
	}
}