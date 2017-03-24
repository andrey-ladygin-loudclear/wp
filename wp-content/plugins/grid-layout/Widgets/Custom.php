<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Glyph;

class Custom extends Glyph {
	
    public function draw() {
		View::load("Templates/Frontend/glyph", array('widget' => $this));
    }
    
}