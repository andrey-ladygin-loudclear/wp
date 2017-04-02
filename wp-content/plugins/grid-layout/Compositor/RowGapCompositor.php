<?php

namespace GL\Compositor;

use GL\Classes\Assets;
use GL\Factories\WidgetFactory;
use GL\Widgets\Carousel;
use GL\Widgets\System\Row;

class RowGapCompositor {
	
	public function compose($childrens) {
		$currRow = 0;
		$prevCol = 0;
		
		$currRow = 0;
		$nextRow = 0;
//		echo '<pre>';
//		print_r($childrens);
//		die;
		
		foreach($childrens as $key => &$widget) {
			
			if($widget instanceof Row) {
				continue;
			}
			
			Assets::addPack($widget->getJs());
			Assets::addPack($widget->getCss());
			
			if($this->widgetInIteralbeCointainer($widget)) {
				$this->modifyChildrens($widget);
				continue;
			}
			
			if($widget->getRow() >= $nextRow) {
				$row = WidgetFactory::getObject('row');
				$row->setRow($currRow);
				$currRow = $nextRow;
				$prevCol = 0;// Added
				$childrens[] = $row;
			}
			
			if($widget->getRow() + $widget->getHeight() >= $nextRow) {
				$nextRow = $widget->getRow() + $widget->getHeight();
			}
			
			$row->insert($widget);
			unset($childrens[$key]);
			
//			if($widget->getRow() != $currRow) {
//				$prevCol = 0;
//				$currRow = $widget->getRow();
//			}
			
			if($widget->getCol() != $prevCol) {
                $offset = $widget->getCol() - $prevCol;
				$widget->setOffset($offset);
			}
			
			$prevCol = $widget->getCol() + $widget->getWidth();
			
			if($widget->getChildren()) {
				$widget->childrens = $this->compose($widget->getChildren());
			}
		}
		
		return $childrens;
	}

	private function widgetInIteralbeCointainer($widget) {
		return $widget->getParent() instanceof Carousel;
	}
	
	private function modifyChildrens($widget) {
		$widget_childrens = $widget->getChildren();
		
		if(!$widget_childrens) {
			return;
		}
		
		if(count($widget_childrens) > 1) {
			$widget->childrens = $this->compose($widget_childrens);
		} else {
			$widget->childrens = current($widget_childrens)->getChildren();
		}
	}
}