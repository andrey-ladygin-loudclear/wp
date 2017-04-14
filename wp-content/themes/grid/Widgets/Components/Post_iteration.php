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
			'default' => "<div class='item'>",
		),
		'after' => array(
			'label' => "After",
			'size' => 'form-group',
			'type' => 'text',
			'default' => '</div>',
		),
	);
	
	public function draw($before = '', $after = '', $showMainContainer = FALSE) {
		if(!$showMainContainer) {
			echo "<div class='{$this->getClass()}'>";
		}
		
		while(have_posts()) {
			the_post();
			View::load('Templates/Frontend/Widgets/WP/post_iteration', array(
				'widget' => $this,
				'before' => $before,
				'after' => $after,
			));
		}
		
		if(!$showMainContainer) {
			echo "</div>";
		}
	}
}