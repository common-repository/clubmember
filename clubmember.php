<?php
/*
Plugin Name: Clubmember 
Plugin URI: http://alaminopu.me/plugins/
Description: To manage different type of Clubs
Author: Md. Al-Amin opu
Author URI: http://alaminopu.me
Version: 0.2
License: GPL2
*/

if( !defined("ABSPATH") ) exit();

if( is_admin() ){
	require_once dirname(__FILE__) ."/includes/admin/profile.php";
	require_once dirname(__FILE__) ."/includes/admin/menu.php";
}

/**
* Activation function
*
* Creating table when installing the plugin
*/

function clubmember_activation(){
	global $wpdb;
	$table_name = $wpdb->prefix."clubmember_users";
	$sql_drop = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql_drop);

	$sql = "CREATE TABLE IF NOT EXISTS $table_name(
		`id` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
		`full_name` varchar(50) DEFAULT NULL,
		`department` varchar(50) DEFAULT NULL,
		`semester` varchar(20) DEFAULT NULL,
		`class_roll` varchar(20) DEFAULT NULL,
		`email` varchar(40) DEFAULT NULL,
		`phone` varchar(40) DEFAULT NULL,
		`membership_date` date DEFAULT NULL,
		`membership_duration` int,
		PRIMARY KEY(`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	// db query 
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta($sql);
}

register_activation_hook( __FILE__ , "clubmember_activation" );

// Update process
// add_action( 'upgrader_process_complete', 'clubmember_activation');

/* Stylesheet and Scripts added */
function clubmember_wp_enqueue_scripts(){
		$assets = plugins_url( "assets/" , __FILE__);
		wp_enqueue_style("clubmember", $assets. "css/layout.css" );
		wp_enqueue_style('clubmember-admin-ui-css',
                'http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css',
                false,
                '0.2',
                false);

		// Script files
		wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script(
			'clubmember',
			$assets  . '/js/clubmember.js',
			array( 'jquery' )
		);
}

add_action( "admin_enqueue_scripts", "clubmember_wp_enqueue_scripts" );


/* shortcode */
function get_all_clubmembers(){
	ob_start();
	require_once dirname(__FILE__) ."/includes/functions.php";
	require_once dirname(__FILE__) ."/templates/theme-view-all-member.php";
	return ob_get_clean();
}
add_shortcode("view-clubmembers", "get_all_clubmembers" );
