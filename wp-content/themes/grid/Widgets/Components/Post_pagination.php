<?php


namespace GL\Widgets\Components;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Post_pagination extends Widget {
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
		'mid_size' => array(
			'label' => "Mid Size",
			'size' => 'form-group',
			'type' => 'int',
			'default' => '1',
			'help' => 'How many page numbers to display to either side of the current page. Defaults to 1.',
		),
		'prev_text' => array(
			'label' => "Prev Text",
			'size' => 'form-group',
			'type' => 'text',
			'default' => 'Previous',
			'help' => 'Text of the link to the next set of posts. Defaults to “Previous”.',
		),
		'next_text' => array(
			'label' => "Next Text",
			'size' => 'form-group',
			'type' => 'text',
			'default' => 'Next',
			'help' => 'Text of the link to the next set of posts. Defaults to “Next”',
		),
		'screen_reader_text' => array(
			'label' => "Screen Reader Text",
			'size' => 'form-group',
			'type' => 'text',
			'default' => 'Posts navigation',
			'help' => 'Text meant for screen readers. Defaults to “Posts navigation”',
		),
	);
	
	public function getBackendTemplate() {
		return 'callable';
	}
	
	
	public function draw() {
        add_filter('redirect_canonical','pif_disable_redirect_canonical');
        
        function pif_disable_redirect_canonical($redirect_url) {
            if (is_singular()) $redirect_url = false;
            return $redirect_url;
        }
		View::load('Templates/Frontend/Widgets/WP/post_pagination', array(
			'widget' => $this,
		));
	}
}