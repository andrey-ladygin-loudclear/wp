<?php
namespace GL\Traits;

trait WidgetAssets {
	protected $js = [];
	protected $css = [];
	
	public function getJs() {
		return $this->js;
	}
	
	public function getCss() {
		return $this->css;
	}
}