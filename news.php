<?php
if (isset($_GET['name']) && isset($_GET['pass'])) {
	$login = login($_GET['name'], $_GET['pass']);
	if ($login == "User not premium") {
		register($_GET['name'], $_GET['pass']);
		echo '<h3 style="text-align: center;">You have been registered! You may now log in.</h3>';
	}
	elseif ($login == "Bad login") {
		echo '<h3 style="text-align: center;">You must own the account that you are registering with me.<br />Please register your own account at Minecraft.net first.</h3>';
	}
	else {
		echo '<h3 style="text-align: center;">There has been an error. It appears you may be premium.<br />This may indicate a connection issue with Minecraft servers.</h3>';
	}
}
else {
	echo '<h1 style="text-align: center;">Under Construction<!--Register your cracked account:</h1><form action="" style="text-align: center;"><input type="text" name="name" value="Username" /><br /><input type="password" name="pass" value="" /></form>';
}
?>