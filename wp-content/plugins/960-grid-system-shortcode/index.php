<?php
/*
Plugin Name: 960 Grid System Shortcodes
Plugin URI: http://zourbuth.com/plugins/960-grid-system-shortcodes
Description: A complete <a href="http://960.gs/">960 grid system</a> shortcodes. Support 12, 16 and 24 grids system and additional class such as push, pull, omega, alpha, prefix, suffic and clear class. 
Version: 1.1
Author: zourbuth
Author URI: http://zourbuth.com
License: GPL2
*/


/*  Copyright 2011  zourbuth.com  (email : zourbuth@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Launch the plugin. */
add_action( 'plugins_loaded', 'grid_system_shortcodes_plugins_loaded' );

/* Initializes the plugin and it's features. */
function grid_system_shortcodes_plugins_loaded() {

	/* Set constant path to the members plugin directory. */
	define( 'GRID_SYSTEM_SHORTCODES_DIR', plugin_dir_path( __FILE__ ) );

	/* Set constant path to the members plugin directory. */
	define( 'GRID_SYSTEM_SHORTCODES_URL', plugin_dir_url( __FILE__ ) );
	
	/* Load widget file. */
	require_once( GRID_SYSTEM_SHORTCODES_DIR . 'grid-system-shortcodes.php' );
	
	require_once( GRID_SYSTEM_SHORTCODES_DIR . 'shortcode/sc-function.php' );
}

function extract_attr($atts) {
	if ( is_array($atts) )
		foreach ( $atts as $att )
			$style .= ' ' . $att;

	return $style;
}
?>