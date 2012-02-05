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
	$return = cURL("http://184.73.166.45/game/checkserver.jsp?user=" . $user . "&serverId=" . $serverId);
}
elseif ($haspaid == "false") {
	//User is not premium, allow in
	$return = "YES";
}
else {//Something went awkwardly wrong, reject the client
	$return = "NO";
}
//Echo result
echo $return;
?>