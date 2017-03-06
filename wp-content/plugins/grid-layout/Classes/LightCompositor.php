<?php

namespace GL;

class LightCompositor {
	public function compose(Glyph $widget) {
        foreach($widget->getChildren() as $child) {
            $this->compose($child);
        }
	}
}