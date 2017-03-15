<?php

namespace GL\Widgets\System;

class Blank extends Widget {
	
	public function draw() {
		echo "<div class='widget col-md-{$this->width} well' style='border: 1px solid orange;'>";
		echo "&nbsp;";
		echo "</div>";
	}
	
}