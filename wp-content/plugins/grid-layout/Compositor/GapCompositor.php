<?php

namespace GL;

class GapCompositor {
	
	public function compose($childrens) {
		$currRow = 0;
		$prevCol = 0;
		
		foreach($childrens as &$widget) {
			
			if($widget->getRow() != $currRow) {
				$prevCol = 0;
				$currRow = $widget->getRow();
			}
			
			if($widget->getCol() != $prevCol) {
				$widget->offset = $widget->getCol() - $prevCol;
			}
			
			$prevCol = $widget->getCol() + $widget->getWidth();
			
			if($widget->getChildren()) {
				$widget->childrens = $this->compose($widget->getChildren());
			}
		}
		
		return $childrens;
	}
}