<?php
/**
 * @var $widgets array
 */
use GL\Classes\Grid_Widget;
use GL\Interfaces\GlyphInterface;
use GL\Interfaces\GridInterface;

?>

<div class="container-fluid">

<?php
foreach($widgets as $widget) {
	/** @var $widget GlyphInterface|GridInterface|Grid_Widget */
	
	if($widget->isFullWidth()) {
		echo "</div>";
	}
	
    $widget->draw();
	
	if($widget->isFullWidth()) {
		echo "<div class=\"container-fluid\">";
	}
}
?>

</div>