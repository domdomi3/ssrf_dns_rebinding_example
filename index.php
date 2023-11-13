<?php

$host = $_GET['host'];
if($host){
	if(($host === "metadata.google.internal") || (gethostbyname($host) === "169.254.169.254")) exit("Disallowed host");
	sleep(1); // example for some slow logic
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://{$host}");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 4);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($curl);
	echo $response;
	curl_close($curl);
}else{
	echo "/?host=www.google.com";
}

?>
