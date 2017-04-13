<?php

namespace GL\Classes;

include \GL_Grid_Layout::$DIR."/Libraries/lessphp/lessc.inc.php";

Class Less {
		
	private $compiler;
	private $styles = '';
	
	public function __construct()
	{
		$this->compiler = new \lessc();
	}
	
	public function add_style()
	{
		
	}
}
