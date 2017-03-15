<?php


use GL\Classes\View;
use GL\Widgets\System\Widget;

class Text extends Widget {
	protected $table = 'gl_widget_text';
	
	public $text;
	
	public function fill($data) {
		$this->text = $data['text'];
		return parent::fill($data);
	}
	
	public function getText() {
	    return $this->text;
    }
	
	public function draw() {
	    View::load("Templates/Frontend/text", array('widget' => $this));
	}
}