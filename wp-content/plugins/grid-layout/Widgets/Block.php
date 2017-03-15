<?php

namespace GL\Widgets;

use GL\View;

class Block extends Glyph {

    public function draw() {
        View::load("Templates/Frontend/block", array('widget' => $this));
    }
    
}