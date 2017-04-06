<?php

namespace GL\Interfaces;

interface LayoutRepositoryInterface
{
	public function find($widget);
	public function save($json, $post_id, $parent_type = 'page');
	public function removeAll($post_id, $parent_type);
	public function add($widget);
	public function getHierarchy($parent_id, $parent_type = 'page');
	public function getGrid($post_id, $parent_type = 'page');
}