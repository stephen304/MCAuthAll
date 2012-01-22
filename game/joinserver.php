<?php
//Get variables
$user = $_GET['user'];
$sessionId = $_GET['sessionId'];
$serverId = $_GET['serverId'];

//Get functions
include '../functions.php';

//Check if premium
$haspaid = cURL("http://www.minecraft.net/haspaid.jsp?user=" . $user);
if ($haspaid == "true") {
	//User is premium, send server id to official mc server
	$return = cURL("http://session.minecraft.net/game/joinserver.jsp?user=" . $user . "&sessionId=" . $sessionId . "&serverId=" . $serverId);
}
elseif ($haspaid == "false") {
	//User is not premium, don't do anything and carry on
	$return = "OK";
}
else {//Something went awkwardly wrong, reject the client
	$return = "Bad login";
}
//Echo result
echo $return;
?>