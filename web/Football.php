<?php  
/* TODO:
	-Make select option filler function
	-Dynamic borders?
*/
require("dbConnect.php");
require("getData.php");
require("addData.php");
require("teamSelect.php");
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="football.css">
	<title>Football Spreads</title>
</head>
<body>
	<div>
		<span>This web appllication is designed to analyze the performance of NFL football teams.  This is accomplished by not only taking a look at a team's win/loss record, but also looking at the difference between a team's projected point spread and actual point spread for a given game.  A projected point spread is the number of points that the sports analysts in Las Vegas expect a team to win or lose by.  If a point spread is negative, the team is expected to win by that many points and visa-versa for a positive spread.  By comparing what the actual point spread of a game with the projected point spread of a game over time, we can determine if a team is generally overperforming or underperforming.</span>
		<br>
		<br>
		<span>Select an NFL Team</span>
		<br>
		<form id="Team"  method="post" action="Football.php">
			<select name="Team1">
				<option value=""  selected>-Select-</option>
				<?php 
				selectTeam();

				?>
				<!--
				<option value="New England Patriots">New England Patriots</option>
				<option value="Dallas Cowboys">Dallas Cowboys</option>
				<option value="Philadelphia Eagles">Philadelphia Eagles</option>
				<option value="Pittsburgh Steelers">Pittsburgh Steelers</option>
				<option value="Green Bay Packers">Green Bay Packers</option>
				<option value="New York Giants">New York Giants</option>
				<option value="Seattle Seahawks">Seattle Seahawks</option>
				<option value="Oakland Raiders">Oakland Raiders</option>
				<option value="Chicago Bears">Chicage Bears</option>
				<option value="Minnesota Vikings">Minnesota Vikings</option>
				<option value="Kansas City Chiefs">Kansas City Chiefs</option>
				<option value="San Francisco 49ers">San Francisco 49ers</option>
				<option value="Cleveland Browns">Cleveland Browns</option>
				<option value="Denver Broncos">Denver Broncos</option>
				<option value="Los Angeles Rams">Los Angeles Rams</option>
				<option value="Miami Dolphins">Miami Dolphins</option>
				<option value="Washington Redskins">Washington Redskins</option>
				<option value="Cincinnati Bengals">Cincinnati Bengals</option>
				<option value="Baltimore Ravens">Baltimore Ravens</option>
				<option value="New York Jets">New York Jets</option>
				<option value="Carolina Panthers">Carolina Panthers</option>
				<option value="Buffalo Bills">Buffalo Bills</option>
				<option value="Arizona Cardinals">Arizona Cardinals</option>
				<option value="New Orleans Saints">New Orleans Saints</option>
				<option value="Atlanta Falcons">Atlanta Falcons</option>
				<option value="Los Angeles Chargers">Los Angeles Chargers</option>
				<option value="Houston Texans">Houston Texans</option>
				<option value="Detroit Lions">Detroit Lions</option>
				<option value="Jacksonville Jaguars">Jacksonville Jaguars</option>
				<option value="Indianapolis Colts">Indianapolis Colts</option>
				<option value="Tennesse Titans">Tennesse Titans</option>
				<option value="Tampa Bay Buccaneers">Tamps Bay Buccaneers</option> 
			-->
			</select>
			<br>
			<button type="submit" form="Team">Submit</button>
		</form>
	</div>
		<br>
	<div>
		<span>Add or Edit Game Information</span>
	<form id="edit"  method="post" action="Football.php">
			Team: <select name="Team2">
				<option value=""  selected>-Select-</option>
				<option value="New England Patriots">New England Patriots</option>
				<option value="Dallas Cowboys">Dallas Cowboys</option>
				<option value="Philadelphia Eagles">Philadelphia Eagles</option>
				<option value="Pittsburgh Steelers">Pittsburgh Steelers</option>
				<option value="Green Bay Packers">Green Bay Packers</option>
				<option value="New York Giants">New York Giants</option>
				<option value="Seattle Seahawks">Seattle Seahawks</option>
				<option value="Oakland Raiders">Oakland Raiders</option>
				<option value="Chicago Bears">Chicage Bears</option>
				<option value="Minnesota Vikings">Minnesota Vikings</option>
				<option value="Kansas City Chiefs">Kansas City Chiefs</option>
				<option value="San Francisco 49ers">San Francisco 49ers</option>
				<option value="Cleveland Browns">Cleveland Browns</option>
				<option value="Denver Broncos">Denver Broncos</option>
				<option value="Los Angeles Rams">Los Angeles Rams</option>
				<option value="Miami Dolphins">Miami Dolphins</option>
				<option value="Washington Redskins">Washington Redskins</option>
				<option value="Cincinnati Bengals">Cincinnati Bengals</option>
				<option value="Baltimore Ravens">Baltimore Ravens</option>
				<option value="New York Jets">New York Jets</option>
				<option value="Carolina Panthers">Carolina Panthers</option>
				<option value="Buffalo Bills">Buffalo Bills</option>
				<option value="Arizona Cardinals">Arizona Cardinals</option>
				<option value="New Orleans Saints">New Orleans Saints</option>
				<option value="Atlanta Falcons">Atlanta Falcons</option>
				<option value="Los Angeles Chargers">Los Angeles Chargers</option>
				<option value="Houston Texans">Houston Texans</option>
				<option value="Detroit Lions">Detroit Lions</option>
				<option value="Jacksonville Jaguars">Jacksonville Jaguars</option>
				<option value="Indianapolis Colts">Indianapolis Colts</option>
				<option value="Tennesse Titans">Tennesse Titans</option>
				<option value="Tampa Bay Buccaneers">Tampa Bay Buccaneers</option>
			</select>
			Week Number: <select name="weekNumber">
				<option value="" selected>-Select-</option>
				<option value="1">Week 1</option>
				<option value="2">Week 2</option>
				<option value="3">Week 3</option>
				<option value="4">Week 4</option>
				<option value="5">Week 5</option>
				<option value="6">Week 6</option>
				<option value="7">Week 7</option>
				<option value="8">Week 8</option>
				<option value="9">Week 9</option>
				<option value="10">Week 10</option>
				<option value="11">Week 11</option>
				<option value="12">Week 12</option>
				<option value="13">Week 13</option>
				<option value="14">Week 14</option>
				<option value="15">Week 15</option>
				<option value="16">Week 16</option>
			</select>
			<br><br>
			Score: <input type="text" name="score" size="4">
			Opponent Score: <input type="text" name="opponentScore" size="4">
			Projected Spread: <input type="text" name="projectedSpread" size="4">
			Actual Spread: <input type="text" name="actualSpread" size="4">
			<br>
			<button type="submit" form="edit">Submit</button>
		</form>
	</div>
	<div id="results" style="text-align: center">
	<?php 

	getData();
	insertData();
	
	?>
	</div>
</body>
</html>