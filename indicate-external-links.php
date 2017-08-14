<?php
/*
Plugin Name: Indicate External Links
Plugin URI: http://cubecolour.co.uk/indicate-external-links
Description: A simple plugin to indicate outbound links in Posts, Pages and CPTs
Author: cubecolour
Version: 1.0.0
Author URI: http://cubecolour.co.uk/
License: GPLv3

  Copyright 2014 Michael Atkins

  Licenced under the GNU GPL:

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// ==============================================
//  Prevent Direct Access of this file
// ==============================================

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if this file is accessed directly

// ==============================================
//	Get Plugin Version
// ==============================================

function cc_extlink_plugin_version() {
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}

// ==============================================
//	Add Links in Plugins Table
// ==============================================
 
add_filter( 'plugin_row_meta', 'cc_extlink_meta_links', 10, 2 );
function cc_extlink_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);
	
// create the links
	if ( $file == $plugin ) {
		
		$supportlink = 'https://wordpress.org/support/plugin/indicate-external-links';
		$donatelink = 'http://cubecolour.co.uk/wp';
		$reviewlink = 'https://wordpress.org/support/view/plugin-reviews/indicate-external-links#postform';
		$twitterlink = 'http://twitter.com/cubecolour';
		$iconstyle = 'style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;"';
		
		return array_merge( $links, array(
			'<a href="' . $twitterlink . '"><span class="dashicons dashicons-twitter" ' . $iconstyle . 'title="Cubecolour on Twitter"></span></a>',
			'<a href="' . $reviewlink . '"><span class="dashicons dashicons-star-filled"' . $iconstyle . 'title="Review this Plugin"></span></a>',
			'<a href="' . $supportlink . '"> <span class="dashicons dashicons-lightbulb" ' . $iconstyle . 'title="Plugin Support"></span></a>',
			'<a href="' . $donatelink . '"><span class="dashicons dashicons-heart"' . $iconstyle . 'title="Donate"></span></a>'
		) );
	}
	
	return $links;
}

// ==============================================
//  Enqueue jQuery
// ==============================================

function cc_extlink_init() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'cc_extlink_init');


// ==============================================
//  Add Script
// ==============================================

add_action( 'wp_head', 'cc_extlink_class' );

function cc_extlink_class() {
	echo "\n\n<!-- https://wordpress.org/plugins/indicate-external-links/ -->\n" . '<script type="text/javascript">
	jQuery(document).ready(function(){
	jQuery("a[href*=\'http://\']:not([href*=\'"+window.location.hostname+"\'])").not(\'a:has(img)\').addClass("extlink");
	jQuery("a[href*=\'https://\']:not([href*=\'"+window.location.hostname+"\'])").not(\'a:has(img)\').addClass("extlink https");
	});
</script>' . "\n\n";
}

// add rule to remove class from a id it encloses an img

// ==============================================
//  Add CSS
// ==============================================

add_action( 'wp_head', 'cc_extlink_style' );

function cc_extlink_style() {
	echo '<style type="text/css" media=screen>
	.extlink:after {
		content:"\2197";
		font-family: arial ,helvetica, sans-serif;
		padding-left: 0;
		vertical-align: super;
		height: 0;
		line-height: 1;
		display: inline-block;
		white-space: pre-wrap;
		text-decoration: none;
	}
	
	.nav-menu .extlink:after,
	.wp-caption-text .extlink:after {
		content:\'\';
	}
</style>' . "\n\n";
}