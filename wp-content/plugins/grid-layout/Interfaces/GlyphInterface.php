<?php

namespace GL\Interfaces;

interface GlyphInterface {
	public function insert(GlyphInterface $glyph);
	public function draw();
	public function getChildren();
}