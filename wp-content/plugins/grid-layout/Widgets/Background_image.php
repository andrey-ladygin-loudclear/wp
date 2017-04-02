<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Glyph;

class Background_image extends Glyph {
	
	public $schema = array(
		'background' => array(
			'label' => 'Background',
			'type' => 'select',
			'values' => array(
				'cover' => 'cover',
				'auto 100%' => 'auto 100%',
				'100% auto' => '100% auto',
				'100%' => '100%'
			),
			'default' => 'cover',
		),
	);
	
    public function draw() {
		View::load("Templates/Frontend/background_image", array('widget' => $this));
    }
    
}