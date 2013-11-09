<?php
	
$number = $_POST['number'];
$curlPost = "number=".$number;
$link = "http://202.202.43.125/getInformation.php";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);

$html = curl_exec($ch);

//$pattern="/<img.*src\s*=\s*[\"|\']?\s*\s*([^>\"\'\s]*)/i";
//preg_match_all($pattern, $html, $matches);
//print_r($matches);
echo $html;
curl_close($ch);

?>
