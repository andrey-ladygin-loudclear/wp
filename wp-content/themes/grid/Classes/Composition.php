<?php

namespace GL\Classes;

use GL\Compositor\GapCompositor;
use GL\Compositor\RowGapCompositor;
use GL\Widgets\System\Glyph;

class Composition extends Glyph {
	
	private $_compositor;
	public $childrens = array();
	
	public function __construct() {
	    parent::__construct();
		$this->_compositor = new RowGapCompositor();
	}
	
	public function getCol() {}
	
	public function getRow() {}
	
	public function getWidth() {}
	
	public function getHeight() {}
	
	public function setWidth($width) {}
	
	public function setHeight($height) {}
	
	public function setId($id) {}
	
	public function getId() {}
	
	public function setRow($row = 0) {}
	
	public function setCol($col = 0) {}
	
	public function getChildren() {
		return $this->childrens;
	}
	
	public function isEmpty() {
		return empty($this->getChildren());
	}
	
	public function draw() {
		$this->childrens = $this->_compositor->compose($this->childrens);
//		echo '<pre>';
//		print_r($this->getCurrentStructure());
//		die;
		Assets::add('assets/js/scripts.js');
		Assets::add('assets/css/front.css');
		Assets::add('assets/plugins/bootstrap/css/bootstrap.min.css');
		Assets::enqueue();
		View::load('Templates/Frontend/composition', array('widgets' => $this->getChildren()));
	}
}