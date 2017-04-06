<?php if(!empty($css)) { ?>
    <?php
    
    $wp_css = new WP_Styles();
    $css_enqueue = array();
	
	foreach($css as $file) {
		$wp_css->add($file['name'], $file['src']);
		$css_enqueue[] = $file['name'];
	}
	
	$wp_css->enqueue($css_enqueue);
	$wp_css->do_items();
	$wp_css->concat;
	$wp_css->print_html;
	$wp_css->reset();
	
    ?>
<?php } ?>

<?php if(!empty($js)) { ?>
    <?php
	
	$wp_js = new WP_Scripts();
	$js_enqueue = array();
	
	
	foreach($js as $file) {
		$wp_js->add($file['name'], $file['src']);
		$js_enqueue[] = $file['name'];
	}
	
	
	$wp_js->enqueue($js_enqueue);
	$wp_js->do_items();
	$wp_js->concat;
	$wp_js->print_html;
	$wp_js->reset();
	
	?>
<?php } ?>
