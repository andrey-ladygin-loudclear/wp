<?php

namespace GL\Compositor;

class RowCompositor {
	CONST MAX_COLS = 12;
	
	public function compose($childrens) {
		$newStructure = array();
		$currRow = 0;
		$nextRow = 0;
		
		foreach($childrens as $widget) {
			if($widget->getRow() >= $nextRow) {
				$row = WidgetFactory::factory('row');
				$row->setRow($currRow);
				$newStructure[] = $row;
				$currRow = $nextRow;
			}
			
			if($widget->getRow() + $widget->getHeight() >= $nextRow) {
				$nextRow = $widget->getRow() + $widget->getHeight();
			}
			
			$row->insert($widget);
			
			if($widget->getChildren()) {
				$widget->childrens = $this->compose($widget->getChildren());
			}
		}
		
		$newStructure = $this->addBlankWidgets($newStructure);
		
		return $newStructure;
	}
	
	public function addBlankWidgets($structure) {
		foreach($structure as $row) {
			$rows = $row->getRowsCount();
			$lockedCells = $row->getLockedCells();
						
			for($y = 0; $y < $rows; $y++) {
				$widgetWidth = 0;
				
				for($x = 0; $x < RowCompositor::MAX_COLS; $x++) {
					if(!in_array(array($y, $x), $lockedCells)) {
						$widgetWidth++;
					} elseif($widgetWidth) {
						$blank = WidgetFactory::factory('blank');
						$blank->setRow($y);
						$blank->setCol($x - $widgetWidth);
						$blank->setWidth($widgetWidth);
						$row->insert($blank);
						$widgetWidth = 0;
					}
				}
				
				if($widgetWidth) {
					$blank = WidgetFactory::factory('blank');
					$blank->setRow($y);
					$blank->setCol($x - $widgetWidth);
					$blank->setWidth($widgetWidth);
					$row->insert($blank);
				}
			}
			
			$row->sort();
			$row->concatVerticalBlankWidgets();
		}
		
		return $structure;
	}
	
}