<?php

namespace GL;

class Block extends Glyph {

    public function draw() {
        echo "<div class='container-fluid widget col-md-{$this->width} col-md-offset-{$this->offset} well' style='border: 1px solid red;min-height: ".(60*$this->height)."px;'>";

        foreach($this->getChildren() as $child) {
            $child->draw();
        }

        echo "</div>";
    }
    
}