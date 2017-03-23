<?php

namespace GL\Widgets;

use GL\Classes\View;
use GL\Widgets\System\Glyph;

class Custom extends Glyph {
	
    public function draw() {
        View::load("Templates/Frontend/custom", array('widget' => $this));
    }
    
}