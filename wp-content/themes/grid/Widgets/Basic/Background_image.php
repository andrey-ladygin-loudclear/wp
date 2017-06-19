<?php

namespace GL\Widgets\Basic;

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
	
	public function getPreview() {
		if($this->data) {
			return "<img src='{$this->data}' width='100px' height='100px'>";
		}
		
		return '';
	}
	
    public function draw() {
		View::load("Templates/Frontend/Widgets/background_image", array('widget' => $this));
    }
    
}