<?php
//Get variables
$user = $_GET['user'];
$serverId = $_GET['serverId'];

//Get functions
include '../functions.php';

//Check if premium
$haspaid = cURL("http://www.minecraft.net/haspaid.jsp?user=" . $user);
if ($haspaid == "true") {
	//User is premium, require valid credentials
	$return = "http://session.minecraft.net/game/checkserver.jsp?user=" . $user . "&serverId=" . $serverId;
}
elseif ($haspaid == "false") {
	//User is not premium, allow in
	$return = "YES";
}
//Echo result
echo $return;
?>