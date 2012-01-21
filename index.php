<?php
//SETTINGS
$version = "1326382442000";
//SETTINGS

//Get info
$user = $_POST['user'];
$password = $_POST['password'];
$lversion = $_POST['version'];

//Check name
$haspaid = cURL("http://www.minecraft.net/haspaid.jsp?user=" . $user);
if ($haspaid == "true") {
	//They're premium, login with official MC and return a real result
	$return = cURL("https://login.minecraft.net/?user=" . $user . "&password=" . $password . "&version=" . $lversion);
}
elseif ($haspaid == "false") {
	//Not premium, check their info https://www.minecraft.net/login username=user&password=pass
	$return = "Notpremium";
}
//Send info
echo $return;
//Functions
function cURL($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($ch);
}
function login($user, $password) {
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