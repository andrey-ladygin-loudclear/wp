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
		'ratio' => array(
			'label' => 'Ratio',
			'type' => 'input',
			'default' => '0.5',
		),
		'background_position' => array(
			'label' => 'Background Position',
			'type' => 'input',
			'default' => '50% 0%',
		),
	);
    
    protected $js = array(
//        'assets/plugins/paralax/jquery.parallax.min.js',
//        'assets/plugins/paralax/parallax.min.js',
//        //'assets/plugins/paralax/parallax.js',
//        //'assets/plugins/sequence/sequence.min.js'
        'assets/plugins/stellar/jquery.stellar.min.js'
    );
    
    public function draw() {
		View::load("Templates/Frontend/paralax", array('widget' => $this));
    }
    
}