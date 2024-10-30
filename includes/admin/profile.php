<?php
/**
* New user fields added. 
*/
function clubmember_user_contacts($methods){
	$methods['phone']= __("Phone", "clubmember");
	$methods['facebook']=__("Facebook", "clubmember");
	$methods['department']=__("Department", "clubmember");
	$methods['semester'] = __("Semester","clubmember");
	$methods['rollno']=__("Class Roll","clubmember");

	return $methods;

}

add_filter("user_contactmethods", "clubmember_user_contacts");

