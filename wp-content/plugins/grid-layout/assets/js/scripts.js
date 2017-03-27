jQuery(document).ready(function($) {

	$('.widget.gallery').owlCarousel({
		loop:true,
		margin:0,
		nav:true
	});

	// var slider = function (containerId) {
	//
	// 	var options = {
	// 		$Loop: 0,
	// 		$DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
	// 		$SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
	//
	// 		$ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
	// 			$Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
	// 			$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
	// 			$AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
	// 			$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
	// 		}
	// 	};
	//
	// 	var jssor_slider1 = new $JssorSlider$(containerId, options);
	// };
	//
	// slider($('.widget.gallery'));
});