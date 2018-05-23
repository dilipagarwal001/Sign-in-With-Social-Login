<?php

require_once('instaloginapi.php');
require_once('settings.php');

try {
		$instagram_ob = new InstagramApi();
		// Get the access token 
		$accesstoken = $instagram_ob->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL,CLIENT_SECRET, $_GET['code']);
}
catch(Exception $e) {
		echo "Sorry Instagram Returned Error Occured";
        exit;
	}
    
    
if(!isset($accesstoken))
{
    echo 'Bad request'; 
    exit;
}

// Instagram passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])){
	try {
		
		// Get user information
		$user_info = $instagram_ob->GetUserProfileInfo($accesstoken);
		
		
        $instaid=isset($user_info["id"])?$user_info["id"]:"NULL";
		$username=isset($user_info['username'])?$user_info['username']:"NUll";
		$profile_picture=isset($user_info['profile_picture'])?$user_info['profile_picture']:"NUll";
		$full_name=isset($user_info['full_name'])?$user_info['full_name']:"NUll";
		
		echo '<pre>';print_r($user_info); echo '</pre>';
	
	}
	catch(Exception $e) {
		header("Location:http://google.com");
	}
}
else
	header("Location:http://google.com");
?>