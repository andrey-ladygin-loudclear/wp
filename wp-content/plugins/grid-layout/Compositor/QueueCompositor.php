<?php

namespace GL;

class QueueCompositor {
	public function compose(GlyphInterface $widget) {
		$need_to_insert = array();
		
		foreach($widget->getChildren() as $row) {
			var_dump('NEXT ROW!!!!!!!!!!!!!!!!!!!!');
			$curr_row = $row->key();
            $prev_widget_width = 0;
            $prev_widget_col = 0;

            echo "++";var_dump($curr_row);
			foreach($row as $child_widget) {

				$prev_widget_right_col = $prev_widget_col + $prev_widget_width;
				$missed_cols = $child_widget->getCol() - $prev_widget_right_col;

				echo "<pre>";
				print_r($child_widget);
				var_dump($prev_widget_right_col);
				var_dump($missed_cols);

				if($missed_cols) {
					$blank = WidgetFactory::factory('blank');
					$blank->setRow($curr_row);
					$blank->setCol($prev_widget_right_col);

					echo "--";var_dump($curr_row);

					$blank->setWidth($missed_cols);
					//$need_to_insert[] = $blank;
                    $widget->insert($blank);
                    print_r($blank);
				}

                echo "</pre>";
				if($child_widget->getChildren()) {
					$this->compose($child_widget);
				}
				
				$prev_widget_width = $child_widget->getWidth();
				$prev_widget_col = $child_widget->getCol();
			}
		}
		
		foreach($need_to_insert as $blank) {
			//$widget->insert($blank);
		}
	}
}