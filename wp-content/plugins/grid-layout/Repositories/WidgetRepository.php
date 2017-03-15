<?php

namespace GL;

include dirname(__FILE__).'../Repositories/WidgetRepository.php';

Class WidgetRepository extends DB implements WidgetRepositoryInterface {
	
	protected $table;
	
	public function add() {
		return $this->insert(array('id' => NULL));
	}
	
	public function remove($id) {
		return $this->delete(array('id' => $id));
	}
	
	public function find($widget_id) {
		return $this->get(array('id' => $widget_id));
	}
	
	public function save($widget_id, $data) {
		$this->update($data, array('id' => $widget_id));
	}
}