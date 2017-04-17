<?php

namespace GL\Widgets\Childs;

use GL\Classes\View;
use GL\Widgets\Block;

class Title_block extends Block {
	
	public function __construct()
	{
		parent::__construct();
		$this->options['background'] = '';
		$this->options['border'] = '';
	}
	
	public function draw() {
		View::load("Templates/Frontend/Widgets/glyph", array('widget' => $this));
	}
}