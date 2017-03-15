<?php

namespace GL\Interfaces;

interface WidgetRepositoryInterface
{
	public function find($widget_id);
	public function add();
	public function save($widget_id, $data);
	public function remove($id = NULL);
	public function fill(array $attributes);
}