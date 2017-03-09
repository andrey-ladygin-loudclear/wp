<?php

namespace GL;

class Glyph implements GlyphInterface {
	public $childrens = array();
    protected $id;
    //protected $padding = [0, 0, 0, 0,];
    //protected $margin = [0, 0, 0, 0,];
    protected $width = 1;
    protected $height = 1;
    protected $row = 0;
    protected $col = 0;
    protected $full_widget = 0;
	
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
        echo "<div class='container-fluid widget col-md-{$this->width} well' style='border: 1px solid red;min-height: ".(60*$this->height)."px;'>";

		foreach($this->getChildren() as $child) {
			$child->draw();
		}

		echo "</div>";
	}
}