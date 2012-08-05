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
		$i++;
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
		mysql_query("INSERT INTO ".$dbTable." (name, token, hash) VALUES('".mysql_real_escape_string($user)."', '".mysql_real_escape_string($sess)."', '0' ) ") 
			or die(mysql_error());  
	}
	else {
		//Already in database, update
		mysql_query("UPDATE ".$dbTable." SET token='".mysql_real_escape_string($sess)."' WHERE name='".mysql_real_escape_string($user)."'") 
			or die(mysql_error());
	}
}
function storeHash($user, $sess, $hash) {
	global $dbHost, $dbUser, $dbPass, $dbName, $dbTable;
	$connection = mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error());
		mysql_select_db($dbName) or die(mysql_error());
	
	$test = mysql_fetch_array(mysql_query("SELECT EXISTS(SELECT 1 FROM ".$dbTable." WHERE name='".$user."')"));
	if ($test[0] == 0) {
		//Not in database, ERROR!!!
		return FALSE;
	}
	else {
		//Already in database, check if session is OK then update
		$result = mysql_query("SELECT * FROM ".$dbTable." WHERE name='".$user."'") or die(mysql_error());
		$row = mysql_fetch_array($result);
		if ($row['token'] == $sess) {
			//Session matches, Store the $hash
			mysql_query("UPDATE ".$dbTable." SET hash='".mysql_real_escape_string($hash)."' WHERE name='".mysql_real_escape_string($user)."'") 
				or die(mysql_error());
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
}
function checkHash($user, $hash) {
	global $dbHost, $dbUser, $dbPass, $dbName, $dbTable;
	$connection = mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error());
		mysql_select_db($dbName) or die(mysql_error());
	
	$test = mysql_fetch_array(mysql_query("SELECT EXISTS(SELECT 1 FROM ".$dbTable." WHERE name='".$user."')"));
	if ($test[0] == 0) {
		//Not in database, ERROR!!!
		return FALSE;
	}
	else {
		//Already in database, check if hash matches
		$result = mysql_query("SELECT * FROM ".$dbTable." WHERE name='".$user."'") or die(mysql_error());
		$row = mysql_fetch_array($result);
		if ($row['hash'] == $hash) {
			//Hash matches
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
}
?>