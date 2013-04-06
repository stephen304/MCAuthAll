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
	//header("Last-Modified: " . date("D, d M Y ", filemtime($file)));
	header("ETag: \"" . md5_file($file) . "\"");
	//header("Accept-Ranges: bytes");
	header("Content-Type: application/octet-stream");
	header("Content-Length: " . filesize($file), true);
	//header("Connection: keep-alive");
	//header("Server: AmazonS3");
	
	//header('Content-Description: File Transfer');
	//header('Content-Type: application/octet-stream');
	//header('Content-Disposition: attachment; filename='.basename($file));
	//header('Content-Transfer-Encoding: binary');
	//header('Expires: 0');
	//header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	//header('Pragma: public');
	//header('Content-Length: ' . filesize($file));
	//ob_clean();
	//flush();
	readfile($file);
}
?>