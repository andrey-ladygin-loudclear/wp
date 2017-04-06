;(function($) {
	var ajaxurl = "/wp-admin/admin-ajax.php";

	selectStyles(getStyleName());

	$('.styles .well').click(function() {
		$('.styles .well').removeClass('active');
		$(this).addClass('active');
		selectStyles($(this).data('name'));
	});

	$('#save-styles').click(function() {
		var name = getStyleName();
		$.post(ajaxurl, {
				action: 'gl_ajax_save_styles',
				style: name,
				widget_name: $('#styles-name').val(),
				widget_id: $('#widget-id').val()
			},
			function(Response) {},
		'html');
	});

	function getStyleName() {
		return $('.styles .well.active').data('name');
	}

	function selectStyles(name) {
		$.post(ajaxurl, {
			action: 'gl_ajax_change_styles',
			style: getStyleName(),
			styles_dir: $('#styles-dir').val(),
			widget_id_attribute: $('#widget-id-attribute').val()
			},
			function(Response) {
				$('#widget_styles').html(Response);
			},
		'html');
	}
})(jQuery);