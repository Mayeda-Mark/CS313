<?php  

function getBorder(){
	$colorLeft = "";
	$colorRight = "";


	$teamID = $_POST['Team1'];
	switch ($teamID) {
		//Patriots
		case '1':
			$colorLeft = "#1F1B69";
			$colorRight = "red";
			break;
		//Cowboys
		case '2':
			$colorLeft = "silver";
			$colorRight = "#1F1B69";
			break;
		//Eagles
		case '3':
			$colorLeft = "#317D35";
			$colorRight = "black";
			break;
		//Steelers
		case '4':
			$colorLeft = "black";
			$colorRight = "yellow";
			break;
		//Packers
		case '5':
			$colorLeft = "#317D35";
			$colorRight = "yellow";
			break;
		//Giants
		case '6':
			$colorLeft = "red";
			$colorRight = "blue";
			break;
		//Seahawks
		case '7':
			$colorLeft = "navy";
			$colorRight = "lime";
			break;
		//Raiders
		case '8':
			$colorLeft = "black";
			$colorRight = "gray";
			break;
		//Bears
		case '9':
			$colorLeft = "#1F1B69";
			$colorRight = "#F47E0E";
			break;
		//Vikings
		case '10':
			$colorLeft = "purple";
			$colorRight = "yellow";
			break;
		//Chiefs
		case '11':
			$colorLeft = "red";
			$colorRight = "gold";
			break;
		//49ers
		case '12':
			$colorLeft = "red";
			$colorRight = "gold";
			break;
		//Browns
		case '13':
			$colorLeft = "#935112";
			$colorRight = "orange";
			break;
		//Broncos
		case '14':
			$colorLeft = "orange";
			$colorRight = "#1F1B69";
			break;
		//Rams
		case '15':
			$colorLeft = "#1F1B69";
			$colorRight = "yellow";
			break;
		//Dolphins
		case '16':
			$colorLeft = "aqua";
			$colorRight = "orange";
			break;
		//Redskins
		case '17':
			$colorLeft = "maroon";
			$colorRight = "gold";
			break;
		//Bengals
		case '18':
			$colorLeft = "#ef7d1a";
			$colorRight = "black";
			break;
		//Ravens
		case '19':
			$colorLeft = "black";
			$colorRight = "purple";
			break;
		//Jets
		case '20':
			$colorLeft = "#317D35";
			$colorRight = "white";
			break;
		//Panthers
		case '21':
			$colorLeft = "black";
			$colorRight = "teal";
			break;
		//Bills
		case '22':
			$colorLeft = "blue";
			$colorRight = "red";
			break;
		//Cardinals
		case '23':
			$colorLeft = "black";
			$colorRight = "red";
			break;
		//Saints
		case '24':
			$colorLeft = "black";
			$colorRight = "gold";
			break;
		//Falcons
		case '25':
			$colorLeft = "red";
			$colorRight = "black";
			break;
		//Chargers
		case '26':
			$colorLeft = "blue";
			$colorRight = "yellow";
			break;
		//Texans
		case '27':
			$colorLeft = "#1F1B69";
			$colorRight = "red";
			break;
		//Lions
		case '28':
			$colorLeft = "399ACF";
			$colorRight = "silver";
			break;
		//Jaguars
		case '29':
			$colorLeft = "teal";
			$colorRight = "gold";
			break;
		//Colts
		case '30':
			$colorLeft = "white";
			$colorRight = "blue";
			break;
		//Titans
		case '31':
			$colorLeft = "#1F1B69";
			$colorRight = "red";
			break;
		//Bucaneers
		case '32':
			$colorLeft = "black";
			$colorRight = "red";
			break;
		//Default
		default:
			$colorLeft = "blue";
			$colorRight = "red";
			break;
	}
	echo "style='border-left:100px solid " . $colorLeft . "; border-right:100px solid " . $colorRight . "; background-color:#e0e0d1;'";
}
?>