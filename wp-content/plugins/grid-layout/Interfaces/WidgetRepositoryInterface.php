<?php

namespace GL;

interface WidgetRepositoryInterface
{
	public function find($widget_id);
	public function add();
	public function save($widget_id, $data);
	public function remove($id);
}