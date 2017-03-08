<?php

namespace GL;

include_once dirname(__FILE__).'/../Interfaces/Glyph.php';
include_once dirname(__FILE__).'/../Helpers/WidgetPriorityQueue.php';

class Widget implements GlyphInterface {
    protected $childrens = array();
    //protected $padding = [0, 0, 0, 0,];
    //protected $margin = [0, 0, 0, 0,];
	protected $width = 1;
    protected $height = 1;
	protected $row = 0;
	protected $col = 0;
    protected $full_widget = 0;

    public function __construct() {}
	
	public function getCol() {
		return $this->col;
	}
	
	public function getRow() {
		return $this->row;
	}
	
	public function getWidth() {
		return $this->width;
	}
	
	public function getHeight() {
		return $this->height;
	}

    public function setWidth($width) {
	    $this->width = $width;
    }

	public function setHeight($height) {
	    $this->height = $height;
    }
    
	public function setRow($row = 0) {
		$this->row = $row;
	}
	
	public function setCol($col = 0) {
		$this->col = $col;
	}
	
	public function setId($id) {}
    
	public function getId() {}

	public function insert(GlyphInterface $widget) {}

	public function getChildren() { return []; }
	
	public function draw() {
		echo "";
	}
}