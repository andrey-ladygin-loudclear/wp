<?php

namespace GL;

interface WidgetRepositoryInterface
{
	public function find($widget_name, $widget_id);
	public function add($name);
	public function save($widget_name, $widget_id, $data);
	public function remove($id, $name);
}