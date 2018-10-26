<?php  
//addData.php

function insertData() {
	$db = get_db();
	//Set Variables
	$teamName2 = $_POST['Team2'];
	$weekNumber = $_POST['weekNumber'];
	$score = $_POST['score'];
	$opponentScore = $_POST['opponentScore'];
	$projectedSpread = $_POST['projectedSpread'];
	$actualSpread = $_POST['actualSpread'];
	$iswin = false;

	if ($teamName2 != "") {

	$query = "SELECT id FROM Team WHERE Name = '" . $teamName2 . "';";
		foreach ($db->query($query) as $team) {

			$teamID = $team['id'];
		}

	try {
		//Score
		$query1 = 'INSERT INTO Score (Team_id, Week_id, TeamScore, OppScore, realSpread, isWin)
		VALUES (:Team_id, :Week_id, :TeamScore, :OppScore, :realSpread, :isWin)';
		$statement = $db->prepare($query1);
		//get isWin
		if ($score > $opponentScore) {
			$iswin = true;
		}
		echo $teamID . $weekNumber . $score . $opponentScore . $actualSpread . $iswin;
		$statement->bindValue(':Team_id', $teamID);
		$statement->bindValue(':Week_id', $weekNumber);
		$statement->bindValue(':TeamScore', $score);
		$statement->bindValue(':OppScore', $opponentScore);
		$statement->bindValue(':realSpread', $actualSpread);
		$statement->bindValue(':isWin', $iswin);

		$statement->execute();

		$scoreID = $db->lastInsertId("Score_id_seq");

		//Spread
		$query2 = 'INSERT INTO Spread (Team_id, Week_id, proj_spread)
		VALUES (:Team_id, :Week_id, :proj_spread)';
		$statement = $db->prepare($query2);

		$statement->bindValue(':Team_id', $teamID);
		$statement->bindValue(':Week_id', $weekNumber);
		$statement->bindValue(':proj_spread', $projectedSpread);

		$statement->execute();

		$spreadID = $db->lastInsertId("Spread_id_seq");

		//Analysis
		$query3 = 'INSERT INTO Analysis (Team_id, Week_id, spread_id, score_id, spreaddifference)
		VALUES(:Team_id, :Week_id, :spread_id, :score_id, :spreaddifference)';
		//get spreadDifference
		$spreadDifference = $projectedSpread - $actualSpread;

		$statement->prepare($query3);

		$statement->bindValue(':Team_id', $teamID);
		$statement->bindValue(':Week_id', $weekNumber);
		$statement->bindValue(':spread_id', $spreadID);
		$statement->bindValue(':score_id', $scoreID);
		$statement->bindValue(':spreaddifference', $spreadDifference);

		$statement->execute();

		$analysisID = $db->lastInsertId("Analysis_is_seq");

		echo "Scores successfully added.";
	}

	catch(Exception $ex) {
		echo "Error with DB. DetailsL $ex";
		die();
	}
}
}
?>
