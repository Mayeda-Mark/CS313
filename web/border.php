<?php  

function getBorder(){
	$colorLeft = "";
	$colorRight = "";


	$teamID = $_POST['Team1'];
	switch ($teamID) {
		case 'value':
			# code...
			break;
		
		default:
			$colorLeft = "blue";
			$colorRight = "red";
			break;
	}
	echo "style='border-left:20px solid " . $colorLeft . "; border-right:20px solid " . $colorRight . ";'";
?>