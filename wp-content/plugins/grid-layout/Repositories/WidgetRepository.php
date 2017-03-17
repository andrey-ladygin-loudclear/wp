<?php

namespace GL\Repositories;

use GL\Classes\DB;
use GL\Interfaces\WidgetRepositoryInterface;
use JsonSerializable;

include dirname(__FILE__).'../Repositories/WidgetRepository.php';

Class WidgetRepository extends DB implements WidgetRepositoryInterface, JsonSerializable {
	
	protected static $table;
	protected $id;
	
	public function add() {
		$id = parent::insert(array('id' => NULL));
		$this->id = $id;
		return $this;
	}
	
	public function remove($id = NULL) {
		if(empty($id)) {
			$id = $this->id;
		}
		
		return $this->delete(array('id' => $id));
	}
	
	public function find($widget_id) {
		$widget_table = self::getTable();
		$layout_table = LayoutRepository::getTable();
		
		$sql = "SELECT * FROM {$layout_table} wgg
			LEFT JOIN $widget_table wt ON wt.id = wgg.widget_id AND wgg.widget_name = 'glyph'
			WHERE wt.id = {$widget_id};";
		
		return $this->fill($this->query($sql));
	}
	
	public function save($widget_id, $data) {
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
		
		return $this;
	}
	
	public function getName() {
		return strtolower(end(explode('\\', static::class)));
	}
	
	public function getPreview() {
		return '';
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
		);
	}
}