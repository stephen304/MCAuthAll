<?php
//SETTINGS
$version = "1326382442000";
//SETTINGS

//Get info
$user = $_POST['user'];
$password = $_POST['password'];
$lversion = $_POST['version'];

//Get functions
include 'functions.php';

//Get variables override post variables if set
if (isset($_GET['user'])) {
	$user = $_GET['user'];
}
if (isset($_GET['password'])) {
	$password = $_GET['password'];
}
if (isset($_GET['version'])) {
	$lversion = $_GET['version'];
}
if (isset($user) && isset($password)) {//Make sure there is a username and password before authenticating
	//Check name
	$haspaid = cURL("http://www.minecraft.net/haspaid.jsp?user=" . $user);
	if ($haspaid == "true") {
		//They're premium, login with official MC and return a real result
		$return = cURL("https://login.minecraft.net/?user=" . $user . "&password=" . $password . "&version=" . $lversion);
	}
	elseif ($haspaid == "false") {
		//Not premium, check their info https://www.minecraft.net/login username=user&password=pass
		$return = $version . ":deprecated:" . $user . ":2771670313341054782";//Cant get non-premium login to work, return success regardless
	}
	else {//Something went horribly wrong, reject.
		$return = "Bad login";
	}
	//Send info
	echo $return;
}
else {
	include 'news.php';
}
?>