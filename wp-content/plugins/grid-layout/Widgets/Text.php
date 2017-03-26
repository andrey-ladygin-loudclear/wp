<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Text extends Widget {
	protected static $table = 'gl_widget_text';
	
	public $text;
	protected $fillable = ['text'];
	
	public function fill(array $attributes) {
		$this->text = $attributes['text'];
		return parent::fill($attributes);
	}

    public function getPreview() {
        return $this->text;
    }
	
	public function getText() {
	    return $this->text;
    }
	
	public function draw() {
	    View::load("Templates/Frontend/text", array('widget' => $this));
	}
}