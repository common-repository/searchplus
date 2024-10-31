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
 * Removes unwanted characters from the blog name
 */ 
function searchplus_fix_acccount_name($name) {
	$name = str_replace ( 'http://', '', $name );
	$name = str_replace ( 'https://', '', $name );
	$name = str_replace ( '/', '_', $name );
	$name = str_replace ( '@', '_', $name );
	$name = str_replace ( '.', '_', $name );
	
	return $name;
}

/**
 * Invoked if there is no account
 */
function searchplus_no_account() {
    // do nothing at thois point    
}

/**
 * Asserts that the account exists
 */
function searchplus_assert_account() {
    if (searchplus_account_exists () == 0) {
        searchplus_no_account ();
		return 0;
	}
	else 
		return 1;
}

/**
 * Checks if the account variable is set
 * @return number
 */
function searchplus_account_exists() {
    $account = dym_account_token ();
	
	$is_empty = empty ( $account );
	if ($is_empty) {
		return 0;
	}
	
	$is_set = isset ( $account );
	if (! $is_set) {
		echo 'not_set';
		return 0;
	}
	
	return 1;
}

/**
 * Gets the account setting
 * @return string
 */
function dym_account_token() {
    $option = get_option ( 'dym_token' );
    $option = trim($option, '\"');
    // pre-1.3
    if($option == '') {
        $option = get_option ( 'searchplus_token' );
        $option = trim($option, '\"');
    }
    // pre-1.2
    if($option == '') {
	   $option = get_option ( 'sp_token' );
 	   $option = trim($option, '\"');
    }
    
    // TBD: Remove at some point
    // update to the most recent
    if($option != '') {
        update_option ( 'dym_token', $option, true );
    }
 	
//  	// default: WP - FREE
//  	if($option == '')
//  	    $option = 'db0c6691-97f1-451b-b96b-d2849f6dcb1d';
 	
	return $option;
}

/**
 * Gets the account setting
 * @return string
 */
function dym_account_name() {
    $option = get_option ( 'dym_name' );
    $option = trim($option, '\"');
    // pre-1.3
    if($option == '') {
        $option = get_option ( 'searchplus_name' );
        $option = trim($option, '\"');
    }
    // pre-1.2
    if($option == '') {
        $option = get_option ( 'sp_name' );
        $option = trim($option, '\"');
    }
   
    
    // TBD: Remove at some point
    // update to the most recent
    if($option != '') {
        update_option ( 'dym_name', $option, true );
    }
        
    
//     // default: WP - FREE
//     if($option == '')
//         $option = ''; // 'ACCOUNT_NAME';
        
        return $option;
}

?>