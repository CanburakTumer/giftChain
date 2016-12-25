<?php

$verici = array("person1@example.com","person2@example.com","person3@example.com","person4@example.com");
$alici = array("Person 1","Person 2","Person 3","Person 4");
$kalanlar = array_keys($alici);

$cntVerici = count($verici);
/*
Print arrays for debug purposes
print_r($alici);
echo "<br>";
print_r($kalanlar);
echo "<br>";
*/

$subject = "Yılbaşı Kurası";
$from = "giftChain@example.com";

for($i = 0; $i<$cntVerici; $i++){
	$cntKalan = count($kalanlar);
	$aliciID = rand(0, $cntKalan-1);
	$index = $kalanlar[$aliciID];
	
	if($i == $index) {
		$i--;
		continue;
	}	
	
	$to = $verici[$i];
	$message = "Hediye alacağın kişi : ".$alici[$index];
	//echo $to."-".$message."<br>"; // Print on screen for debug purposes
	
	$alici = array_diff_key($alici, [$index=>"x"]);
	$kalanlar = array_keys($alici);
	
	mail($to,$subject,$message,"From: ".$from);
	echo "Mail sent to : ".$to."<br>";
	
	/*
	Print arrays status for debug purposes
	print_r($alici);
	echo "<br>";
	print_r($kalanlar);
	echo "<br>";
	*/
}





?>
