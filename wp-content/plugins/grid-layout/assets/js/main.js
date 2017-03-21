if(typeof tinymce != 'undefined') {
	tinymce.init({
		selector:'textarea',
		theme: 'modern',
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
		],
		toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		content_css: '//www.tinymce.com/css/codepen.min.css'
	});
	//http://stackoverflow.com/questions/26263597/open-access-wp-media-library-from-tinymce-plugin-popup-window
}

jQuery(document).ready(function($){

	var mediaUploader;

	$(document).on('click', '.upload-button', function(e) {

		e.preventDefault();
		// If the uploader object has already been created, reopen the dialog
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}
		// Extend the wp.media object
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			}, multiple: false });

		// When a file is selected, grab the URL and set it as the text field's value
		mediaUploader.on('select', function() {
			var attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#image-url').val(attachment.url);
		});
		// Open the uploader dialog
		mediaUploader.open();
	});

});