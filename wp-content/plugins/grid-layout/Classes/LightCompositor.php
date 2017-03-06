<?php

namespace GL;

class LightCompositor {
	public function compose(Glyph $widget) {
        foreach($widget->getChildren() as $child) {
            if($child->getChildren()) {
                $this->compose($child);
            }
        }
	}
}