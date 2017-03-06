<?php

require get_template_directory() . '/functions/init.php';
require get_template_directory() . '/functions/acf.php';
require get_template_directory() . '/functions/assets.php';
require get_template_directory() . '/functions/navs.php';
require get_template_directory() . '/functions/helpers.php';
require get_template_directory() . '/functions/ajax.php';

/*
 * Optimizely and formidable forms don't play well together.
 * Formidable form uses bootstrap js which was causing problems. 
 * This bug was reported https://formidablepro.com/help-desk/conflicts-with-optimizely/
 * There was no fix at the time of writing. This fix removes bootstrap js but causes
 * problems when mouseover formidable form tooltips. This is ok for now as it doesn't 
 * affect the functionality.
 * 
 * Remember to remove this fix when formidable form or optimizely fixes the issue.
 * Bernard 27 Nov 2015
 */
function formidable_optimizely_script_fix() {
	wp_dequeue_script( 'formidable_admin' );
	wp_register_script( 'formidable_admin_fixed', FrmAppHelper::plugin_url() . '/js/formidable_admin.js', array(
	                    'formidable_admin_global', 'formidable', 'jquery',
	                    'jquery-ui-core', 'jquery-ui-draggable',
	                    'jquery-ui-sortable',
	            ), FrmAppHelper::plugin_version(), true );
	wp_enqueue_script( 'formidable_admin_fixed' );

    $frm_settings = FrmAppHelper::get_settings();
    wp_localize_script( 'formidable_admin_fixed', 'frm_admin_js', array(
            'confirm_uninstall' => __( 'Are you sure you want to do this? Clicking OK will delete all forms, form data, and all other Formidable data. There is no Undo.', 'formidable' ),
            'desc'              => __( '(Click to add description)', 'formidable' ),
            'blank'             => __( '(Blank)', 'formidable' ),
            'no_label'          => __( '(no label)', 'formidable' ),
            'saving'            => esc_attr( __( 'Saving', 'formidable' ) ),
            'saved'             => esc_attr( __( 'Saved', 'formidable' ) ),
            'ok'                => __( 'OK' ),
            'cancel'            => __( 'Cancel', 'formidable' ),
            'default'           => __( 'Default', 'formidable' ),
            'clear_default'     => __( 'Clear default value when typing', 'formidable' ),
            'no_clear_default'  => __( 'Do not clear default value when typing', 'formidable' ),
            'valid_default'     => __( 'Default value will pass form validation', 'formidable' ),
            'no_valid_default'  => __( 'Default value will NOT pass form validation', 'formidable' ),
            'confirm'           => __( 'Are you sure?', 'formidable' ),
            'conf_delete'       => __( 'Are you sure you want to delete this field and all data associated with it?', 'formidable' ),
            'conf_delete_sec'   => __( 'WARNING: This will delete all fields inside of the section as well.', 'formidable' ),
            'conf_no_repeat'    => __( 'Warning: If you have entries with multiple rows, all but the first row will be lost.', 'formidable' ),
            'default_unique'    => $frm_settings->unique_msg,
            'default_conf'      => __( 'The entered values do not match', 'formidable' ),
            'enter_email'       => __( 'Enter Email', 'formidable' ),
            'confirm_email'     => __( 'Confirm Email', 'formidable' ),
            'enter_password'    => __( 'Enter Password', 'formidable' ),
            'confirm_password'  => __( 'Confirm Password', 'formidable' ),
            'import_complete'   => __( 'Import Complete', 'formidable' ),
            'updating'          => __( 'Please wait while your site updates.', 'formidable' ),
            'no_save_warning'   => __( 'Warning: There is no way to retrieve unsaved entries.', 'formidable' ),
            'private'           => __( 'Private' ),
            'jquery_ui_url'     => FrmAppHelper::jquery_ui_base_url(),
    ) );

}
add_action( 'wp_print_scripts', 'formidable_optimizely_script_fix', 100 );