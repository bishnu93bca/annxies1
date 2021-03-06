<?php
/*///////////////////////////////////////////////////////////////////////
Part of the code from the book 
Building Findable Websites: Web Standards, SEO, and Beyond
by Aarron Walter (aarron@buildingfindablewebsites.com)
http://buildingfindablewebsites.com

Distrbuted under Creative Commons license
http://creativecommons.org/licenses/by-sa/3.0/us/
///////////////////////////////////////////////////////////////////////*/

function storeAddress(){

	// Validation
	if(!$_POST['email']){ return "No email address provided"; } 

	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_POST['email'])) {
		return "Email address is invalid"; 
	}

	require_once('MCAPI.class.php');
	// grab an API Key from http://admin.mailchimp.com/account/api/
	$api = new MCAPI('14520ec65f0226e226dc2f4d5736f319-us5');
	
	// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
	// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
	$list_id = "29193efcde";
	$merge_vars = array('FNAME'=>$_POST['Name']);
	

	if($api->listSubscribe($list_id, $_POST['email'],$merge_vars, '') === true) {
		// It worked!	

		return 'Success! Check your email to confirm sign up.';
	}else{
		// An error ocurred, return error message

		return 'Error: ' . $api->errorMessage;
	}
	
}

// If being called via ajax, autorun the function
if($_POST['ajax']){ echo storeAddress(); }
?>
