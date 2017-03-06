<?php

namespace GL;

interface GlyphInterface {
	public function insert($glyph);
	public function draw();
	public function getChildren();
}