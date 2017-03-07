<?php

namespace GL;

class Blank extends Widget {
	
	public function __construct() {}

	public function draw() {
		echo "<div class='widget col-md-{$this->width} well' style='border: 1px solid orange;'>";
		echo "&nbsp;";
		echo "</div>";
	}
}