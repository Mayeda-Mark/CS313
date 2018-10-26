<?php  

//Set up table
	function getData() {

	$db = get_db();
	$teamName = $_POST['Team1'];
	if ($teamName != "") {
	echo "<h1 style=\"text-align: left\">" . $teamName . "</h1><table border=\"1\"><tr>";
	echo "<th>Week</th>";
	echo "<th>Score</th>";
	echo "<th>Opponent Score</th>";
	echo "<th>W/L</th>";
	echo "<th>Projected Spread</th>";
	echo "<th>Actual Spread</th>";
	echo "<th>Spread Difference</th></tr>";

	//Get team id
	$query1 = "SELECT id FROM Team WHERE Name = '" . $teamName . "';";
	foreach ($db->query($query1) as $team) {
		$teamID = $team['id'];
	}

	//Get table
	$query2 = "SELECT Analysis.Team_id, Analysis.Week_id, Score.teamScore, Score.oppScore, Score.iswin, Spread.proj_spread, Score.realSpread, Analysis.spreadDifference FROM ((Analysis INNER JOIN Spread ON Analysis.spread_id = Spread.id) INNER JOIN Score ON Analysis.score_id = Score.id) WHERE Analysis.Team_id = " . $teamID . ";";

	//Fill table
	foreach ($db->query($query2) as $row) {	
		//Week
		echo "<tr><td><style= 'text-align:center'>" . $row['week_id'] .  "</td><td>"; 
		//Team Score
		echo $row['teamscore'] . "</td><td>"; 
		//Oponent score
		echo $row['oppscore'] . "</td>"; 
		//Win/Loss
		if ($row['iswin']) {
			echo "<td>W</td><td>"; 
			$totalWins++;
			}
		elseif ($row['teamscore'] == $row["oppscore"]) {
			echo "<td>D</td><td>";
			$totalDraws++;
		}
		else {
			echo "<td style='color:red;'>L</td><td>"; 
			$totalLosses++;
		}
		//Projected Spread
		echo $row['proj_spread'] . "</td><td>";
		//Actual Spread
		echo $row['realspread'] . "</td>";
		//Spread Difference
		if ($row['spreaddifference'] < 0) {
		echo "<td style='color:red;'>" . $row['spreaddifference'] . "</td></tr>";
		}
		else {
		echo "<td>" . $row['spreaddifference'] . "</td></tr>";	
		}
		//Get running total of spread difference
		$totalDifference += $row['spreaddifference'];
		//Inciment Weeks
		$weeks++;
}
echo "</table>";
echo "<p style=\"text-align:left\">Win/Loss Record: " . $totalWins. "/" . $totalLosses;
if ($totalDraws) {
	echo "/" . $totalDraws;
}
echo "<br>Average spread difference: " . $totalDifference / $weeks . "</p>";
}
}
?>