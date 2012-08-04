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
?>