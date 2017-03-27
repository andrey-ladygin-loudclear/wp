<?php

namespace GL\Widgets\System;

use GL\Classes\Grid_Widget;
use GL\Classes\Structure;
use GL\Interfaces\GlyphInterface;
use GL\Repositories\WidgetRepository;

class Glyph extends Grid_Widget implements GlyphInterface {
	
	public $childrens = array();
    
	protected $id;
    protected $offset = 0;
    protected $width = 1;
    protected $height = 1;
    protected $row = 0;
    protected $col = 0;
    protected $full_widget = 0;
	
	protected $js = [];
	protected $css = [];
	
	public function insert(GlyphInterface $widget) {
		$this->childrens[] = $widget;
	}
	
	public function getId() {
		return $this->id;
	}
	
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
	
	public function setId($id) {
		$this->id = $id;
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
	
	public function getJs() {
		return $this->js;
	}
	
	public function getCss() {
		return $this->css;
	}
	
	public function getChildren() {
	    if($this->childrens) {
	        return $this->childrens;
        }

        foreach(Structure::getWidgets($this->id, 'glyph') as $child_widget) {
	        $this->insert($child_widget);
        }

		return $this->childrens;
	}
	
	public function draw() {
		var_dump('Glyph still output info in class');
        echo "<div class='container-fluid widget col-md-{$this->width} col-md-offset-{$this->offset} well' style='border: 1px solid red;min-height: ".(60*$this->height)."px;'>";

		foreach($this->getChildren() as $child) {
			$child->draw();
		}

		echo "</div>";
	}
}