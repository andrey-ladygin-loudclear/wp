<?php

namespace GL\Widgets\Childs;

use GL\Classes\View;
use GL\Widgets\Block;
use GL\Widgets\Components\Post_title;

class Head_block extends Block {
	
	public function __construct()
	{
		parent::__construct();
		$this->options['background'] = '#f5f5f5';
		$this->options['border'] = '1px solid rgba(0, 0, 0, 0.1)';
		$this->insert(new Post_title());
		
		/*
		 *
		 * $title = new Post_title();
		 * $title->addClass(some class);
		 * $title->setOption('before');
		 *
		 * */
	}
	
	public function draw() {
		View::load("Templates/Frontend/Widgets/glyph", array('widget' => $this));
	}
}