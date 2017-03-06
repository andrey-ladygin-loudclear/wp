<?php

namespace GL;

class Glyph implements GlyphInterface {
	private $childrens = array();
    protected $id;
    protected $padding = [0, 0, 0, 0,];
    protected $margin = [0, 0, 0, 0,];
    protected $width = 1;
    protected $height = 1;
    protected $row = 0;
    protected $col = 0;
    protected $full_widget = 0;

	public function __construct($data) {
        $this->id = $data['widget_id'];
        $this->width = $data['size_x'];
    }

    public function insert($widget) {
		$this->childrens[] = $widget;
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
        echo "<div class='container-fluid widget col-md-{$this->width} well' style='border: 1px solid red;'>";

		foreach($this->getChildren() as $child) {
			$child->draw();
		}

		echo "</div>";
	}
}