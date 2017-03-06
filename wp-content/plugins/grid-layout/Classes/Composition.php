<?php

namespace GL;

include_once dirname(__FILE__).'/../Interfaces/Glyph.php';
include dirname(__FILE__).'/../Classes/LightCompositor.php';

class Composition implements GlyphInterface {
	
	private $_compositor;
	private $childrens = array();
	
	public function __construct() {
		$this->_compositor = new LightCompositor();
	}
	
	public function insert($widget) {
		$this->childrens[] = $widget;
	}
	
	public function getChildren() {
		return $this->childrens;
	}
	
	public function draw() {
        $this->_compositor->compose($this);

		echo '<div class="container-fluid">';

		foreach($this->getChildren() as $child) {
			$child->draw();
		}

		echo '</div>';
	}
}