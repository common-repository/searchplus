<?php
/*
 * Plugin Name: SearchPlus
 * Plugin URI: https://searchplus.pro
 * Description: Search+ WordPress PlugIn
 * Version: 1.5
 * Author: Soundex Ltd.
 * Author URI: https://soundex.tech
 * License: GPL
 */

/*
 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 
 Copyright 2012-2027 Soundex Ltd.
 */

/**
 * Define some useful constants
 */
define ( 'SEARCHPLUS_VERSION', '1.4' );
define ( 'SEARCHPLUS_DIR', plugin_dir_path ( __FILE__ ) );
define ( 'SEARCHPLUS_REMOTE_URL', "https://searchplus.pro/package/");// "/didyoumean-ui-package/" ); 
define ( 'SEARCHPLUS_LOCAL_URL', plugin_dir_url ( __FILE__ ));

/**
 * Configuration-related functions
 */
require_once 'config.php';
/**
 * Account-related functions
 */
require_once 'includes/account.php';
/**
 * General-purpose functions
 */
require_once 'includes/functions.php';


/**
 * T=registers jquery+bootstrap, used by both client and admin
 */
function searchplus_register_base_scripts() {
    wp_enqueue_script('jquery-core');
    
    wp_register_script('searchplus_bootstrap_js', plugins_url('assets/js/bootstrap.min-5.2.2.js', __FILE__ ), array( 'jquery-core' ),'3.6.1',true );
    wp_enqueue_script('searchplus_bootstrap_js');
    
    wp_register_style('searchplus_bootstrap_css', plugins_url('assets/css/bootstrap.min-5.2.2.css', __FILE__ ));
    wp_enqueue_style('searchplus_bootstrap_css');
}


/**
 * Registers the client scripts
 */
function searchplus_register_client_scripts() {
    // jquery+bootstrap
    searchplus_register_base_scripts();
    
    // sp.js
    wp_register_script('searchplus_js', SEARCHPLUS_REMOTE_URL.'sp.js', array( 'jquery-core', 'searchplus_bootstrap_js'), '1.0', true );
    wp_enqueue_script('searchplus_js');
    
    // sp-wp.js
    wp_register_script('searchplus_wp_js', plugins_url('sp-wp.js', __FILE__ ), array( 'searchplus_js' ), '', true);
    wp_enqueue_script('searchplus_wp_js');
    
    // construct the searchplus js initialization code
    $dym_init_script = 'SP.config.root = \''.SEARCHPLUS_REMOTE_URL.'\';'
        .' SP.wp.init(\''.dym_account_token().'\',\''.SEARCHPLUS_VERSION.'\');';
    
    wp_add_inline_script('searchplus_wp_js', $dym_init_script, 'after');
}

add_action('wp_enqueue_scripts', 'searchplus_register_client_scripts');


/**
 * Attaches the scripts for the admin pages
 */
function searchplus_regiuster_admin_scripts( $hook ) {
    searchplus_register_base_scripts();
}

add_action('admin_enqueue_scripts', 'searchplus_regiuster_admin_scripts');


/**
 * Adds a "Serch+" link to the admin menu
 */
function searchplus_register_web_menu_page() {
	$hook = add_menu_page ( 'Search+', 'Search+', 'manage_options', 'searchplus_menu_page', 'searchplus_page_main', '', null, 9 );
}

add_action ( 'admin_menu', 'searchplus_register_web_menu_page' );

require_once 'includes/searchplus_page_main.php';
?>