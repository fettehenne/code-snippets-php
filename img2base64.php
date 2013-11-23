<?php
 
$files = array_slice($argv, 1);
 
foreach ($files as $file) 
{
	$picture = file_get_contents($file);
	$size = getimagesize($file);
 
	// base64 encode the binary data, then break it into chunks according to RFC 2045 semantics
	$base64 = chunk_split(base64_encode($picture));
	echo '<img src="data:' . $size['mime'] . ';base64,' . "\n" . $base64 . '" ' . $size[3] . ' />', "\n";
}

?>