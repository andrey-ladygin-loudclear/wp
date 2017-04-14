<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Glyph;

class Block extends Glyph {
	
	public $schema = array(
		'background' => array(
			'label' => 'Background Color',
			'type' => 'text',
			'default' => '',
		),
	);
	
    public function draw() {
        View::load("Templates/Frontend/Widgets/glyph", array('widget' => $this));
    }
}