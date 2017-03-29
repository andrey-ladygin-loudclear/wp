<?php

namespace GL\Classes;

use GL\Interfaces\GlyphInterface;
use GL\Repositories\WidgetRepository;

class Grid_Widget extends WidgetRepository {
	
	
	// What this should be? wp_gl_grid params or wp_gl_widget?
	//
	protected $js = [];
	protected $css = [];
	
	public function getJs() {
		return $this->js;
	}
	
	public function getCss() {
		return $this->css;
	}
	
	public function getIdAttribute() {
		return "widget-" . $this->getId();
	}
}