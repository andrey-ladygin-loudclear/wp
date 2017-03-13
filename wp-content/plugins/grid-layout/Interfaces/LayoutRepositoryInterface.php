<?php

namespace GL;

interface LayoutRepositoryInterface
{
	public function find($widget);
	public function save($json, $post_id, $parent_type = 'page');
	public function removeAll($post_id, $parent_type);
}