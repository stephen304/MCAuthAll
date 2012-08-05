<?php
//Includes
include '../config.php';
include '../functions.php';

//Get variables
$user = $_GET['user'];
$sessionId = $_GET['sessionId'];
$serverId = $_GET['serverId'];

//Check if premium
$haspaid = cURL("http://www.minecraft.net/haspaid.jsp?user=" . $user);
if ($haspaid == "true") {
	//User is premium, send server id to official mc server
	$return = cURL("http://session.minecraft.net/game/joinserver.jsp?user=" . $user . "&sessionId=" . $sessionId . "&serverId=" . $serverId);
}
elseif ($haspaid == "false") {
	//User is not premium. If DB is true, attempt to store server hash using session ID
	if ($useDB == 1) {
		if (storeHash($user, $sessionId, $serverId)) {
			$return = "OK";
		}
		else {
			$return = "Bad login";
		}
	}
	else {
		//Not using DB, allow nonpremium user
		$return = "OK";
	}
}
else {//Something went awkwardly wrong, reject the client
	$return = "Bad login";
}
//Echo result
echo $return;
?>