<head>
	<meta charset="<?php bloginfo('charset') ?>" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title><?php wp_title('') ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="msapplication-config" content="browserconfig.xml" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.png" />
	<?php wp_head() ?>
	<script>
		<?php
			$laurusOptions = get_option('lauruscrm_options', array());
			$programObjectives = $laurusOptions['program_objectives'];
		 ?>
		var programObjectives = <?php echo json_encode($programObjectives) ?>;
	</script>
</head>