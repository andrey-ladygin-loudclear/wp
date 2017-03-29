<?php

namespace GL\Classes;

use GL\Interfaces\GlyphInterface;
use GL\Repositories\WidgetRepository;
use GL\Traits\Griddable;
use GL\Traits\WidgetAssets;

class Grid_Widget extends WidgetRepository {
	
	use WidgetAssets;
	use Griddable;
	
	protected $id;
	
	// What this should be? wp_gl_grid params or wp_gl_widget?
	//
	
	public function getIdAttribute() {
		return "widget-" . $this->getId();
	}
	
	public function getStylesDir() {
		return $this->getName();
	}
}