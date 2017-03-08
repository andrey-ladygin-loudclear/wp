<?php

namespace GL;

class QueueCompositor {
	CONST MAX_COLS = 12;
	
	private $locked_cells = array();
	private $prev_widget_width = 0;
	private $prev_widget_col = 0;
	private $currentWidget;
	private $currentRow;
	private $currentCol;
	
	public function compose(GlyphInterface $widget) {
		$this->currentWidget = & $widget;
		
		foreach($widget->getChildren() as $row_key => $row) {
			$this->prev_widget_width = 0;
			$this->prev_widget_col = 0;
			
			$this->currentRow = $row_key;
			$this->eachRow($row);
		}
	}
	
	private function eachRow($row) {
		foreach($row as $col_key => $child_widget) {
			if($child_widget instanceof Blank) continue;
			
			$this->currentCol = $col_key;
			$this->eachCol($child_widget);
		}
		
		$prev_widget_right_col = $this->prev_widget_col + $this->prev_widget_width;
		$missed_cols = QueueCompositor::MAX_COLS - $prev_widget_right_col;
		
		echo "<pre>";
		var_dump($this->prev_widget_col);
		var_dump($this->prev_widget_width);
		var_dump($missed_cols);
		echo "</pre>";
		
		if($missed_cols) {
			$this->addBlankWidget($prev_widget_right_col, $missed_cols);
		}
	}
	
	private function lockCells($child_widget) {
		if($child_widget->getHeight() > 1) {
			$row = $child_widget->getRow();
			$col = $child_widget->getCol();
			$height = $child_widget->getHeight() - 1;
			$width = $child_widget->getWidth() - 1;
			
			for($i = $row; $i < $height; $i++) {
				for($j = $col; $j < $width; $j++) {
					$this->locked_cells[] = array($row + $i, $col + $j);
				}
			}
		}
	}
	
	private function eachCol($child_widget) {
		
		$this->lockCells($child_widget);
		
		$this->addBeforeBlankWidgets($child_widget);
		
		//TODO: fix it !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$widget = $this->currentWidget;
		if($child_widget->getChildren()) {
			$this->compose($child_widget);
		}
		$this->currentWidget = $widget;
		
		$this->prev_widget_width = $child_widget->getWidth();
		$this->prev_widget_col = $child_widget->getCol();
	}
	
	private function addBeforeBlankWidgets($child_widget) {
		$prev_widget_right_col = $this->prev_widget_col + $this->prev_widget_width;
		$missed_cols = $child_widget->getCol() - $prev_widget_right_col;
		
		if($missed_cols) {
			$this->addBlankWidget($prev_widget_right_col, $missed_cols);
		}
	}

	private function addBlankWidget($col, $width) {
		//var_dump($col);
		$first_pos = $col;
		$last_post = $first_pos + $width - 1;
		
		var_dump($last_post - $first_pos);
		
		for($i = $first_pos; $i <= $last_post; $i++) {
			$blank = WidgetFactory::factory('blank');
			$blank->setRow($this->currentRow);
			$blank->setCol($i);
			$blank->setWidth(1);
			
			if(in_array(array($this->currentRow, $i), $this->locked_cells)) {
				$blank->setEmpty();
			}
			
			$this->currentWidget->insert($blank);
		}
	}
}