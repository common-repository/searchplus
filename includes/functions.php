<?php
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
 * Saves the account token
 */ 
function dym_save_token_action_callback() {
    $account_token = sanitize_text_field($_POST ['token']);
    $account_name = sanitize_text_field($_POST ['name']);

	update_option ( 'dym_token', $account_token, true );
	update_option ( 'dym_name', $account_name, true );
	
	$result = dym_account_token();
	$account_name = $result; 

	echo esc_html($account_token);

	wp_die();
}

add_action ( 'wp_ajax_nopriv_dym_save_token', 'dym_save_token_action_callback' );
add_action ( 'wp_ajax_dym_save_token', 'dym_save_token_action_callback' );

/**
 * Saves the account token
 */
function dym_reset_token_action_callback() {
   delete_option ( 'dym_token' );
   delete_option ( 'searchplus_token' );
   delete_option ( 'sp_token' );
   
   delete_option ( 'dym_name' );
   delete_option ( 'searchplus_name' );
   delete_option ( 'sp_name' );
    
   wp_die();
}

add_action ( 'wp_ajax_nopriv_dym_reset_token', 'dym_reset_token_action_callback' );
add_action ( 'wp_ajax_dym_reset_token', 'dym_reset_token_action_callback' );

/**
 * Gets the account token
 */
function dym_account_token_action_callback() {
    $account_name = sanitize_text_field($_POST ['input_name']);

	$result = ''; 
	$account_name = $result; 

	echo esc_html($account_name);

	wp_die();
}

add_action ( 'wp_ajax_nopriv_dym_account_token', 'dym_account_token_action_callback' );
add_action ( 'wp_ajax_dym_account_token', 'dym_account_token_action_callback' );

?>