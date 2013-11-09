<?php
	$temp = array(
	"你" =>array("q1"=>"xxx1"),
	"我" => array("q2"=>"xxx2"),
	 "他"=>array("q3"=>"xxx3"),
	  "t3" => array("q4"=>"xxx4")
	 );
	foreach($temp as $temp1=>$tempx){
		echo $temp1."|";
		foreach ($tempx as $key => $value) {
		echo $key."|".$value;
		// echo "<br>";
		}

	}

	var_dump($temp);

	print_r($temp);
	?>
  