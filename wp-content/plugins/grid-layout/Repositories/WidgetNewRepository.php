<?php

namespace GL\Repositories;

use GL\Classes\DB;
use GL\Interfaces\WidgetRepositoryInterface;
use JsonSerializable;

Class WidgetNewRepository extends DB {
	
	protected static $table = 'gl_widget';
	protected $fillable = array();
	protected $id;
	
	public static function add($options = array()) {
		
	}
	
	public function remove() {
		
	}
	
	public static function find($widget_id) {
		$widget_table = self::getTable();
		$layout_table = LayoutRepository::getTable();
		
		$sql = "SELECT * FROM {$layout_table} wgg
			LEFT JOIN $widget_table wt ON wt.id = wgg.widget_id AND wgg.widget_name = '{$this->getName()}'
			WHERE wt.id = {$widget_id};";
		
//		$res = $this->query($sql);
//		return $this->fill($res[0]);
	}
	
	public function save() {
		
		
		$fill = array();
		foreach($this->fillable as $field) {
			if(key_exists($field, $data)) {
				$fill[] = $field;
			}
		}
		
		$data = array_intersect_key($data, array_flip($fill));
		
		$this->update($data, array('id' => $widget_id));
	}
	
	public function fill(array $attributes) {
		if(!empty($attributes['widget_id'])) {
			$this->setId($attributes['widget_id']);
		}
		
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
		
		if(!empty($attributes['full_widget'])) {
			$this->setFull($attributes['full_widget']);
		}
		
		if(!empty($attributes['style'])) {
			$this->style = $attributes['style'];
		}
		
		if(json_decode($attributes['options'])) {
			$this->options = (array) json_decode($attributes['options']);
		}
		
//		if(isset($this->options['alias'])) {
//			$this->alias = $this->options['alias'];
//			unset($this->options['alias']);
//		}
//		if(isset($this->options['classes'])) {
//			$this->classes = $this->options['classes'];
//			unset($this->options['classes']);
//		}
//		if(isset($this->options['full_widget'])) {
//			$this->full_widget = $this->options['full_widget'];
//			unset($this->options['full_widget']);
//		}
		
		return $this;
	}
	
	public function getName() {
		return strtolower(end(explode('\\', static::class)));
	}
	
	public function getPreview() {
		return '';
	}
	
	public function getTitle() {
		return !empty($this->alias) ? $this->alias : $this->getName();
	}
	
	public function jsonSerialize() {
		return array(
			'widget_id' => $this->getId(),
			'widget_name' => $this->getName(),
			'row' => $this->getRow(),
			'col' => $this->getCol(),
			'size_x' => $this->getWidth(),
			'size_y' => $this->getHeight(),
			//'full_widget' => $this->getFull(),
			'preview' => $this->getPreview(),
			'title' => $this->getTitle(),
		);
	}
}