<?php
/**
 * @var $widget GL\Widgets\Image
 */
?>

<?php
$id = $widget->getName() . $widget->getId();
//<span class="label label-default"><?= $widget->getName(); </span>
?>

<div class='widget <?= $widget->getName(); ?> col-md-<?= $widget->getWidth(); ?> col-md-offset-<?= $widget->getOffset(); ?> ' id="<?= $id; ?>" style="position:relative;">
	
	<div u="slides" class="slider-container" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: width:1500px; height: 900px;">
		<?php foreach($widget->images as $image) { ?>
			<div><img u="image" src="<?= $image; ?>" /></div>
		<?php } ?>
	</div>
	
</div>
<script>
	;var slider = function (containerId) {
		
		var options = {
			$Loop: 0,
			$DragOrientation: 2,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
			$SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
			
			$ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
				$Class: $JssorBulletNavigator$,              //[Requried] Class to create arrow navigator instance
				$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				$AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
				$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
			}
		};
		var jssor_1_options = {
			$AutoPlay: true,
			$SlideDuration: 800,
			$SlideEasing: $Jease$.$OutQuint,
			$ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$
			},
			$BulletNavigatorOptions: {
				$Class: $JssorBulletNavigator$
			}
		};
		
		var jssor_1_slider = new $JssorSlider$(containerId, jssor_1_options);
		
		/*responsive code begin*/
		/*you can remove responsive code if you don't want the slider scales while window resizing*/
		function ScaleSlider() {
			var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
			if (refSize) {
				refSize = Math.min(refSize, 1920);
				jssor_1_slider.$ScaleWidth(refSize);
			}
			else {
				window.setTimeout(ScaleSlider, 30);
			}
		}
		ScaleSlider();
		$Jssor$.$AddEvent(window, "load", ScaleSlider);
		$Jssor$.$AddEvent(window, "resize", ScaleSlider);
		$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
		/*responsive code end*/
	};
	
	jQuery(document).ready(function(){
		var id = '<?= $id; ?>';
		var container = jQuery('#' + id + ' .slider-container');
		var maxHeight = 0;
		var options = {
			$AutoPlay: true,
			$FillMode: 0
		};
		
		container.find('img').each(function(){
			if(jQuery(this).height() > maxHeight) maxHeight = jQuery(this).height();
		});
		
		container.css({
			//'width': jQuery('#' + id).width() + 'px',
			'height': maxHeight + 'px'
		});
		
		slider(id);
		//var jssor_slider1 = new $JssorSlider$(id, options);
	});
</script>