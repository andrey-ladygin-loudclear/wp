<?php

namespace GL;

include_once dirname(__FILE__).'/../Interfaces/Glyph.php';
include dirname(__FILE__).'/../Compositor/LightCompositor.php';
include dirname(__FILE__).'/../Compositor/QueueCompositor.php';

class Composition implements GlyphInterface {
	
	private $_compositor;
	private $childrens = array();
	
	public function __construct() {
		$this->_compositor = new QueueCompositor();
		$this->childrens = new \SplDoublyLinkedList();
	}
	
	public function insert(GlyphInterface $widget) {
	    try {
			$row = $this->childrens->offsetGet($widget->getRow());
		} catch (\OutOfRangeException $e) {
			$row = new \SplDoublyLinkedList();
			$this->childrens->push($row);
		}

		foreach($row as $key => $col_widget) {
			if($widget->getCol() < $col_widget->getCol()) {
				$row->add($key, $widget);
				return;
			}
		}
		
		$row->push($widget);
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
		$this->_compositor->compose($this);
		
//		echo "<pre>";
//		print_r($this->getChildren());
//		echo "</pre>";
//		die;

		echo '<div class="container-fluid">';

		foreach($this->getChildren() as $child_row) {
			//echo "<div class='row'>";
			foreach($child_row as $child_col) {
				$child_col->draw();
			}
			//echo "</div>";
		}

		echo '</div>';
	}
}