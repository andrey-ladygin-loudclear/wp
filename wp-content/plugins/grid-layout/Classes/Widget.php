<?php

namespace GL;

include_once dirname(__FILE__).'/../Interfaces/Glyph.php';

class Widget implements GlyphInterface {
    protected $childrens = array();
    protected $padding = [0, 0, 0, 0,];
    protected $margin = [0, 0, 0, 0,];
	protected $width = 1;
    protected $height = 1;
	protected $row = 0;
	protected $col = 0;
    protected $full_widget = 0;

    public function __construct($widget) {
        $this->row = $widget['row'];
        $this->col = $widget['col'];
        $this->width = $widget['size_x'];
        $this->height = $widget['size_y'];
        $this->full_widget = $widget['full_widget'];
    }

    public function setWidth($width) {
	    $this->width = $width;
    }

	public function setHeight($height) {
	    $this->height = $height;
    }

	public function insert($widget) {}

	public function getChildren() { return []; }
	
	public function draw() {
		echo "";
	}
}