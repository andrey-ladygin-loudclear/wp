<?php

namespace GL;

class Block extends Glyph {

    public function draw() {
        View::load("Templates/Frontend/block", array('widget' => $this));
    }
    
}