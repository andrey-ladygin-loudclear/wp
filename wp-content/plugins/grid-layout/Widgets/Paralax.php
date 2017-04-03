<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Glyph;

class Paralax extends Glyph {
	
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
    
    protected $js = array(
        'assets/plugins/paralax/parallax.min.js'
    );
    
    public function draw() {
		View::load("Templates/Frontend/paralax", array('widget' => $this));
    }
    
}