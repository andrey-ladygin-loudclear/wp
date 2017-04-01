<?php

namespace GL\Widgets\System;

use GL\Classes\Grid_Widget;
use GL\Interfaces\GlyphInterface;
use GL\Interfaces\GridInterface;
use GL\Repositories\WidgetRepository;

class Widget extends Grid_Widget implements GlyphInterface, GridInterface {
	
    protected $childrens = array();
    protected $id = 0;
    protected $offset = 0;
	protected $width = 1;
    protected $height = 1;
	protected $row = 0;
	protected $col = 0;

    protected $js = [];
    protected $css = [];
	
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

	public function getOffset() {
        return $this->offset;
    }

    public function setOffset($offset) {
        $this->offset = $offset;
    }
	
	public function setId($id) {
		$this->id = $id;
	}
    
	public function getId() {
		return $this->id;
	}
	
	public function getJs() {
		return $this->js;
	}
	
	public function getCss() {
		return $this->css;
	}

	public function insert(GlyphInterface $widget) {}

	public function getChildren() { return []; }
	
	public function draw() {
		echo "";
	}
}