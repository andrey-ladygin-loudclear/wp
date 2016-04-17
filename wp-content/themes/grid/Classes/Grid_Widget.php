<?php

namespace GL\Classes;

use GL\Repositories\WidgetNewRepository;
use GL\Traits\Griddable;
use GL\Traits\GridStructure;
use GL\Traits\WidgetAssets;
use GL\Widgets\System\Glyph;
use JsonSerializable;

class Grid_Widget extends WidgetNewRepository implements JsonSerializable {
	
	use WidgetAssets;
	use Griddable;
	use GridStructure;
	
	protected $id;
	protected $name;
	protected $parent;
	
	public function getIdAttribute() {
		return "widget-" . $this->getId();
	}
	
	public function setParent($widget) {
		$this->parent = $widget;
	}
	
	/** @return Glyph **/
	public function getParent() {
		return $this->parent;
	}
	
	public function getStylesDir() {
		return $this->getName();
	}
	
	public function getName() {
		return strtolower(end(explode('\\', static::class)));
	}
	
	public function isFullWidth() {
		return $this->getWidth() == 12 && $this->full_width;
	}
	
	public function getPreview() {
		return '';
	}
	
	public function getTitle() {
		return !empty($this->alias) ? $this->alias : $this->getName();
	}
	
	public function fill(array $attributes)
	{
		if(!empty($attributes['row'])) {
			$this->setRow($attributes['row']);
		}
		
		if(!empty($attributes['col'])) {
			$this->setCol($attributes['col']);
		}
		
		if(!empty($attributes['size_x'])) {
			$this->setWidth($attributes['size_x']);
		}
		
		if(!empty($attributes['size_y'])) {
			$this->setHeight($attributes['size_y']);
		}
		
		if(!empty($attributes['name'])) {
			$this->name = $attributes['name'];
		}
		
		return parent::fill($attributes);
	}
	
	public function getOption($name) {
	    if(!empty($this->options[$name])) {
	        
	        if(!empty($this->schema[$name]['type'])) {
	            $type = $this->schema[$name]['type'];
            } else {
                $type = $this->schema[$name];
            }
            
            if($type == 'bool') {
                return $this->options[$name] ? 'true' : 'false';
            }
	        
	        return $this->options[$name];
        }
        
        if(!empty($this->schema[$name]['default'])) {
            return $this->schema[$name]['default'];
        }
        
        return '0';
    }
	
	public function jsonSerialize() {
		return array(
			'id' => $this->getId(),
			'name' => $this->getName(),
			'row' => $this->getRow(),
			'col' => $this->getCol(),
			'size_x' => $this->getWidth(),
			'size_y' => $this->getHeight(),
			'preview' => $this->getPreview(),
			'title' => $this->getTitle(),
			'glyph' => $this instanceof Glyph,
		);
	}
}