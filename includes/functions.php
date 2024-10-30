<?php

/**
* Add a single Member
*/
function cm_add_single_member($member_data){
	global $wpdb;
    $table_name = $wpdb->prefix."clubmember_users";

    $wpdb->insert(
        $table_name,
        $member_data
    );

    return $wpdb->insert_id;
}

/**
* Update a single Member
*/
function cm_update_single_member($member_id, $member_data){
	global $wpdb;
	$table_name = $wpdb->prefix."clubmember_users";
	$update_status= $wpdb->update(
            $table_name,
            $member_data,
            array("id"=>$member_id)
        );

	return $update_status;
}

/**
* Get a single Member
*/
function cm_get_single_member($member_id){
    global $wpdb;
    $table_name = $wpdb->prefix."clubmember_users";
    $member = $wpdb->get_row("SELECT * FROM $table_name WHERE id=$member_id");

    return $member;
}


/**
* Get all members 
*/
function cm_get_all_clubmembers(){
	global $wpdb;
    $table_name = $wpdb->prefix."clubmember_users";

     $clubmembers = $wpdb->get_results(
     	"
		SELECT *
		FROM $table_name
     	"
     );

    return $clubmembers;
}
