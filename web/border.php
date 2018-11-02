<?php  

function getBorder(){
	$colorLeft = "";
	$colorRight = "";


	$teamID = $_POST['Team1'];
	switch ($teamID) {
		case '1':
			$colorLeft = "1F1B69";
			$colorRight = "red";
			break;
		/*case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
		case '':
			$colorLeft = "";
			$colorRight = "";
			break;
			*/
		default:
			$colorLeft = "blue";
			$colorRight = "red";
			break;
	}
	echo "style='border-left:50px solid " . $colorLeft . "; border-right:50px solid " . $colorRight . ";'";
}
?>