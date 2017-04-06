<?php

namespace GL\Widgets\System;

class Row extends Glyph {
	
	public function getRowsCount() {
		$lastRow = 0;
		
		foreach($this->getChildren() as $widget) {
			if($widget->getHeight() + $widget->getRow() > $lastRow) {
				$lastRow = $widget->getHeight() + $widget->getRow();
			}
		}
		
		return $lastRow;
	}
	
	public function getLockedCells() {
		$lockedCells = array();
		
		foreach($this->getChildren() as $widget) {
			$lastRow = $widget->getRow() + $widget->getHeight();
			$lastCol = $widget->getCol() + $widget->getWidth();
			
			for($y = $widget->getRow(); $y < $lastRow; $y++) {
				for($x = $widget->getCol(); $x < $lastCol; $x++) {
					$lockedCells[] = array($y, $x);
				}
			}
		}
		
		return $lockedCells;
	}
	
	public function concatVerticalBlankWidgets() {
		foreach($this->childrens as &$widget) {
			if($widget instanceof Blank) {
				
				foreach($this->getChildren() as $key => $check_widget) {
					if($check_widget->getRow() > $widget->getRow() && $check_widget->getWidth() == $widget->getWidth() && $check_widget->getCol() == $widget->getCol()) {
						$height = $widget->getHeight() + 1;
						$widget->setHeight($height);
						unset($this->childrens[$key]);
					}
				}
				
			}
		}
	}
	
	public function sort() {
		usort($this->childrens, function($w1, $w2) {
			if($w1->getRow() == $w2->getRow()) {
				return ($w1->getCol() < $w2->getCol()) ? -1 : 1;
			}
			return ($w1->getRow() < $w2->getRow()) ? -1 : 1;
		});
		
	}
	
	public function isFullWidth() {
		if(!empty($this->childrens[0])) {
			return $this->childrens[0]->getWidth() == 12 && $this->childrens[0]->full_width;
		}
		
		return FALSE;
	}
	
	public function draw() {
		echo "<div class='row'>";
		
		foreach($this->getChildren() as $child) {
			$child->draw();
		}
		
		echo "</div>";
	}
	
}