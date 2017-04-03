<?php
namespace GL\Traits;

trait Griddable {
	
	protected $id;
	protected $offset = 0;
	protected $width = 1;
	protected $height = 1;
	protected $row = 0;
	protected $col = 0;
	
	public function getId() {
		return $this->id;
	}
	
	public function getCol() {
		return $this->col;
	}
	
	public function getRow() {
		return $this->row;
	}
	
	public function getWidth() {
		return $this->width;
	}
	
	public function getHeight() {
		return $this->height;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setWidth($width) {
		$this->width = $width;
	}
	
	public function setHeight($height) {
		$this->height = $height;
	}
	
	public function setRow($row = 0) {
		$this->row = $row;
	}
	
	public function setCol($col = 0) {
		$this->col = $col;
	}
	
	public function getOffset() {
		return $this->offset;
	}
	
	public function setOffset($offset) {
		$this->offset = $offset;
	}
}