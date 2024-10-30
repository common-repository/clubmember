<?php
/**
* admin menu for wordpress
*/
error_reporting(0);

/* Constants */
define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));

/* includes file */
require_once PLUGIN_PATH. "../functions.php";

function clubmember_admin_menu(){
	/* top level menu */
	add_menu_page(
				"Club Members", 
		        "Club Members", 
		        "manage_options", 
		        "clubmember-view-all", 
		        "clubmember_view_all_page",
		        "",
		        '28'
		    );
	add_submenu_page("clubmember-view-all","View All Member", "View All", "manage_options", "clubmember-view-all");
	add_submenu_page("clubmember-view-all","Add New Member", "Add Member", "manage_options", "clubmember-add-member", "clubmember_add_member_page" );
	add_submenu_page(null,"Update Member", "Update Member", "manage_options", "clubmember-update-member", "clubmember_update_member_page" );
	//remove_submenu_page("clubmember-view-all", "clubmember-update-member");
}

add_action("admin_menu", "clubmember_admin_menu");

/**
* view all members
*/
function clubmember_view_all_page(){
	require_once PLUGIN_PATH . "../../templates/view-all-member.php";
}

/* Add new member page */
function clubmember_add_member_page(){
	require_once PLUGIN_PATH . "../../templates/add-new-member.php";
}

/* update member page */
function clubmember_update_member_page(){
	require_once PLUGIN_PATH . "../../templates/update-member.php";
}


