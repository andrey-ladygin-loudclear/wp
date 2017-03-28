<style>
	.border {
		border-top: 1px solid !important;
		border-bottom: 1px solid !important;
		border-left: 1px solid !important;
		border-right: 1px solid !important;
	}
	.widget-elements {
		font-size: 26px;
	}
</style>
<div class="widget-container">
	<?php $widget->draw(); ?>
</div>
<div class="widget-elements"></div>
<script>
	(function($) {
//		$('.widget-container > div *').hover(function(e) {
//			//$(this).addClass('border');
//			$('.widget-container > div .border').removeClass('border');
//			$(e.currentTarget).addClass('border');
//		}, function() {
//			//$(this).removeClass('border');
//		});

		$('.widget-container > div *').each(function() {
			var className = this.className.replace(new RegExp(' ', 'g'), '.');
			$('.widget-elements').append('<span class="label label-default">'+this.localName + (className ? '.'+className : '')+'</span>');
			console.log($(this))
		});
		
		$('.widget-elements .label').hover(function() {
			$('.widget-container > div ' + ($(this).text())).addClass('border');
		}, function() {
			$('.widget-container > div .border').removeClass('border');
		});
	})(jQuery);
</script>