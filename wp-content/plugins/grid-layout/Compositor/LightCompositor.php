<?php

namespace GL;

class LightCompositor {
	public function compose(GlyphInterface $widget) {
		$prev_widget_width = 1;
		$prev_widget_col = 0;
		
        foreach($widget->getChildren() as $child) {
        	
        	$prev_widget_right_col = $prev_widget_col + $prev_widget_width;
        	$missed_cols = $child->getCol() - $prev_widget_right_col;
        	
        	if($missed_cols) {
        		$blank = WidgetFactory::factory('blank');
				$blank->setRow($child->getRow());
				$blank->setCol($prev_widget_right_col);
				$widget->insert($blank);
			}
        	
            if($child->getChildren()) {
                $this->compose($child);
            }
		
			$prev_widget_width = $child->getWidth();
			$prev_widget_col = $child->getCol();
		}
		
		if(!empty($widget->childrens)) {
			usort($widget->childrens, function($w1, $w2) {
				if ($w1->getRow() == $w2->getRow()) {
					return 0;
				}
				
				return ($w1->getRow() < $w2->getRow()) ? -1 : 1;
			});
		}
	}
}