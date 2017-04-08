<?php
namespace GL\Traits;

trait GridStructure {
	
	public function getCurrentStructure() {
		return array(
			'widget' => $this->getName(),
			'childrens' => $this->getChildrenSctructure()
		);
	}
	
	public function getChildrenSctructure() {
		$childrens = array();
		
		foreach($this->getChildren() as $child) {
			$childrens[] = $child->getCurrentStructure();
		}
		
		return $childrens;
	}
}