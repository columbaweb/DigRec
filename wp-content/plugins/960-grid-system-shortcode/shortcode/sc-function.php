<?php
/**
 * zFrame - Shortcodes
 * http://zourbuth.com
 * Version 0.1
 */
 
/** Button informations **/
function gssc_addbuttons() {
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
	// add the button for wp25 in a new way
		add_filter("mce_external_plugins", "add_gssc_tinymce_plugin", 5);
		add_filter('mce_buttons', 'register_gssc_button', 5);
	}
}

/** Let register this button **/
function register_gssc_button($buttons) {
	array_push($buttons, "separator", "gscd");
	return $buttons;
}

/** Load the TinyMCE plugin **/
function add_gssc_tinymce_plugin($plugin_array) {
	$plugin_array['gscd'] = GRID_SYSTEM_SHORTCODES_URL . 'shortcode/editor_plugin.js';	
	return $plugin_array;
}

/** Change the TinyMCE version **/
function gssc_change_tinymce_version($version) {
	return ++$version;
}

/** Modified the version when TinyMCE plugins are changed **/
add_filter('tiny_mce_version', 'gssc_change_tinymce_version');

/** Flow this with init action **/
add_action('init', 'gssc_addbuttons');
?>