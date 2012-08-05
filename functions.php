<?php
//Functions
function cURL($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($ch);
}
function login($user, $password) {
	$url = 'http://login.minecraft.net/?user='.$user.'&password='.$password.'&version=12';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($ch);
}
function randSess() {
	$i = 0;
	$session = "";
	while ($i < 19) {
		$session = $session.mt_rand(0, 9);
	}
	return $session;
}
function storeSess($user, $sess) {
	global $dbHost, $dbUser, $dbPass, $dbName, $dbTable;
	$connection = mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error());
		mysql_select_db($dbName) or die(mysql_error());
	
	$test = mysql_fetch_array(mysql_query("SELECT EXISTS(SELECT 1 FROM ".$dbTable." WHERE name='".$user."')"));
	if ($test[0] == 0) {
		//Not in database, add
		mysql_query("INSERT INTO ".$dbTable." (name, token, hash) VALUES('".$user."', '".$sess."', '0' ) ") 
			or die(mysql_error());  
	}
	else {
		//Already in database, update
		mysql_query("UPDATE ".$dbTable." SET token='".$sess."' WHERE name='".$user."'") 
			or die(mysql_error());
	}
}
?>