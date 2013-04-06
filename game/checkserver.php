<?php
//Includes
include '../config.php';
include '../functions.php';

//Get variables
$user = $_GET['user'];
$serverId = $_GET['serverId'];

//Check if premium
$haspaid = cURL("http://minecraft.net/haspaid.jsp?user=" . $user);
if ($haspaid == "true") {
	//User is premium, require valid credentials
	$return = cURL("http://session.minecraft.net/game/checkserver.jsp?user=" . $user . "&serverId=" . $serverId);
}
elseif ($haspaid == "false") {
	//User is not premium, do this thang
	if ($useDB == 1) {
		if (checkHash($user, $serverId)) {
			$return = "YES";
		}
		else {
			$return = "NO";
		}
	}
	else {
		$return = "YES";
	}
}
else {//Something went awkwardly wrong, reject the client
	$return = "NO";
}
//Echo result
echo $return;
?>