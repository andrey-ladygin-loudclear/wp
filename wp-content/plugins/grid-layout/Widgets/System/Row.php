<?php

namespace GL;

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
	
	public function draw() {
		echo "<div class='row'>";
		
		foreach($this->getChildren() as $child) {
			$child->draw();
		}
		
		echo "</div>";
	}
	
}