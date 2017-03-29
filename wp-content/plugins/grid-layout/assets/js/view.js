;(function($) {
	var ajaxurl = "/wp-admin/admin-ajax.php";

	$('.styles .well').click(function() {
		$('.styles .well').removeClass('active');
		$(this).addClass('active');
		selectStyles($(this).data('name'));
	});

	$('#save-styles').click(function() {
		var name = $('.styles .well.active').data('name');
		$.post(ajaxurl, {
				action: 'gl_ajax_save_styles',
				style: name,
				styles_dir: $('#styles-dir').val(),
				widget_id_attribute: $('#widget-id-attribute').val()
			},
			function(Response) {
				$('#widget_styles').html(Response);
			},
			'html');
	});

	function selectStyles(name) {
		$.post(ajaxurl, {
			action: 'gl_ajax_change_styles',
			style: name,
			styles_dir: $('#styles-dir').val(),
			widget_id_attribute: $('#widget-id-attribute').val()
			},
			function(Response) {
				$('#widget_styles').html(Response);
			},
		'html');
	}
})(jQuery);