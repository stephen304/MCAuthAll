<?php
//Functions
function cURL($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($ch);
}
function login($user, $password) {//This function isnt cooperating
	$url = 'https://www.minecraft.net/login';
	$fields = array(
		'username'=>urlencode($user),
		'password'=>urlencode($password)
	);

	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string,'&');

	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);
	
	//Find result
	$find = 'Oops, unknown username or password.';
 
	// perform the search
	$position = strpos($result, $find);
	if ($position === false) {
		return false;
	}
	else {
		return true;
	}
}
?>