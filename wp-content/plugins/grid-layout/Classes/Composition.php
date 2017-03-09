<?php

namespace GL;

include_once dirname(__FILE__).'/../Interfaces/Glyph.php';
include_once dirname(__FILE__).'/../Widgets/System/Glyph.php';
include_once dirname(__FILE__).'/../Compositor/LightCompositor.php';
include_once dirname(__FILE__).'/../Compositor/QueueCompositor.php';

class Composition extends Glyph {
	
	private $_compositor;
	public $childrens = array();
	
	public function __construct() {
		$this->_compositor = new LightCompositor();
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
	
	public function draw() {
		$this->childrens = $this->_compositor->compose($this->childrens);
		
//		echo "<pre>";
//		print_r($this->getChildren());
//		echo "</pre>";
//		die;

		echo '<div class="container-fluid">';

		foreach($this->getChildren() as $child_row) {
			foreach($child_row as $child_col) {
				$child_col->draw();
			}
		}

		echo '</div>';
	}
}