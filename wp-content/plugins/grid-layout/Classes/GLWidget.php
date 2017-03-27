<?php

namespace GL\Classes;

use GL\Interfaces\GlyphInterface;
use GL\Repositories\WidgetRepository;

class GLWidget extends WidgetRepository {
	
	protected $js = [];
	protected $css = [];
	
	public function getJs() {
		return $this->js;
	}
	
	public function getCss() {
		return $this->css;
	}
}