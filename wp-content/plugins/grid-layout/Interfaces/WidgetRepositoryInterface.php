<?php

namespace GL\Interfaces;

interface WidgetRepositoryInterface
{
	public function find($widget_id);
	public function add();
	public function save();
	public function remove();
	public function fill(array $attributes);
}