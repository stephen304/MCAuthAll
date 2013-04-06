<?php
$req = $_SERVER['REQUEST_URI'];
$path = pathinfo($req);
$file = $path['basename'];
if (strpos($file, "?") === FALSE) {
	//Do nothing! :D
}
else {
	$file = substr($file, 0, strpos($file, "?"));
}
if (file_exists($file)) {
	//Set the ETag that MC uses to verify the download
	header("ETag: \"" . md5_file($file) . "\"");
	header("Content-Type: application/octet-stream");
	//Set content length so the progress bar shows correctly
	header("Content-Length: " . filesize($file), true);
	readfile($file);
}
?>