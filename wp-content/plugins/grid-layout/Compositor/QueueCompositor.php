<?php

namespace GL;

class QueueCompositor {
	public function compose(GlyphInterface $widget) {
		$prev_widget_width = 1;
		$prev_widget_col = 0;
		
		$need_to_insert = array();
		
		foreach($widget->getChildren() as $child_row) {
			
			$curr_row = $child_row->key();
			
			foreach($child_row as $child_col) {
				$prev_widget_right_col = $prev_widget_col + $prev_widget_width;
				$missed_cols = $child_col->getCol() - $prev_widget_right_col;
				
				if($missed_cols) {
					$blank = WidgetFactory::factory('blank');
					$blank->setRow($curr_row);
					$blank->setCol($prev_widget_right_col);
					$need_to_insert[] = $blank;
				}
				
				if($child_col->getChildren()) {
					$this->compose($child_col);
				}
				
				$prev_widget_width = $child_col->getWidth();
				$prev_widget_col = $child_col->getCol();
			}
		}
		
		foreach($need_to_insert as $blank) {
			$widget->insert($blank);
		}
	}
}