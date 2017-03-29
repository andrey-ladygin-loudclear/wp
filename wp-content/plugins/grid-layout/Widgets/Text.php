<?php


namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Widget;

class Text extends Widget {
	public $text;
	
	public function fill(array $attributes) {
		$this->text = $attributes['data'];
		return parent::fill($attributes);
	}
	
	public function save($widget_id, $data) {
		$data['data'] = json_encode($data['text']);
		parent::save($widget_id, $data);
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