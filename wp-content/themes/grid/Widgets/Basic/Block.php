<?php

namespace GL\Widgets\Basic;

use GL\Classes\View;
use GL\Widgets\System\Glyph;

class Block extends Glyph {
	
	public $schema = array(
		'background' => array(
			'label' => 'Background Color',
			'type' => 'text',
			'default' => '',
		),
		'border' => array(
			'label' => 'Border',
			'type' => 'text',
			'default' => '',
		),
		'padding' => array(
			'label' => 'Padding',
			'type' => 'text',
			'default' => '',
		),
		'margin' => array(
			'label' => 'Margin',
			'type' => 'text',
			'default' => '',
		),
	);
	
    public function draw() {
        View::load("Templates/Frontend/Widgets/glyph", array('widget' => $this));
    }
}