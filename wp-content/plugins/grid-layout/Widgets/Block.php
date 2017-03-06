<?php

class Block implements Glyph {
	private $childrens = array();
	
	public function insert($glyph, $col = 0, $row = 0) {
		$this->childrens[] = $glyph;
	}
	
	public function getChildren() {
		return $this->childrens;
	}
	
	public function draw() {
        echo '<div class="container-fluid">';

		foreach($this->getChildren() as $child) {
			$child->draw();
		}

		echo "</div>";
	}
}