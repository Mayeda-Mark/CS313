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
	$iswin = "false";
	$testValue = 0;

	if ($teamName2 != "") {

	$query = "SELECT id FROM Team WHERE Name = '" . $teamName2 . "';";
		foreach ($db->query($query) as $team) {

			$teamID = $team['id'];
		}

	$query4 = "SELECT proj_spread FROM Spread WHERE team_id = " . $teamID . " AND week_id = " . $weekNumber . ";";
		foreach ($db->query($query4) as $spread) {
			$testValue ++;
		}
		echo $testValue;
	if (!$testValue) {

	try {
		//Score
		$query1 = 'INSERT INTO Score (Team_id, Week_id, TeamScore, OppScore, realSpread, isWin)
		VALUES (:Team_id, :Week_id, :TeamScore, :OppScore, :realSpread, :isWin)';
		$statement = $db->prepare($query1);
		//get isWin
		if ($score > $opponentScore) {
			$iswin = "true";
			}
		//echo $teamID . " " . $weekNumber . " " . $score . " " . $opponentScore . " " . $actualSpread . " " . $iswin;
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

		$statement = $db->prepare($query3);

		$statement->bindValue(':Team_id', $teamID);
		$statement->bindValue(':Week_id', $weekNumber);
		$statement->bindValue(':spread_id', $spreadID);
		$statement->bindValue(':score_id', $scoreID);
		$statement->bindValue(':spreaddifference', $spreadDifference);
		try{

		$statement->execute();
	}
		catch(Exception $ex) {
			echo "issue with execute : $ex";
		}
		//$analysisID = $db->lastInsertId("Analysis_is_seq");

		echo "Scores successfully added.";
	}

	catch(Exception $ex) {
		echo "Error with DB. DetailsL $ex";
		die();
	}
}

	if ($testValue) {

	try {
		//Score
		$query1 = "UPDATE Score
		SET Team_id = :Team_id, Week_id = :Week_id, TeamScore = :TeamScore, OppScore = :OppScore, realSpread = :realSpread, isWin = :isWin
		WHERE Team_id = " . $teamID . " AND Week_id = " . $weekNumber . ";";
		$statement = $db->prepare($query1);
		//get isWin
		if ($score > $opponentScore) {
			$iswin = "true";
		}

		$statement->bindValue(':Team_id', $teamID);
		$statement->bindValue(':Week_id', $weekNumber);
		$statement->bindValue(':TeamScore', $score);
		$statement->bindValue(':OppScore', $opponentScore);
		$statement->bindValue(':realSpread', $actualSpread);
		$statement->bindValue(':isWin', $iswin);

		$statement->execute();

		$scoreID = $db->lastInsertId("Score_id_seq");

		//Spread
		$query2 = "UPDATE Spread
		SET Team_id = :Team_id, Week_id = :Week_id, proj_spread = :proj_spread
		WHERE Team_id = " . $teamID . " AND Week_id = " . $weekNumber . ";";

		$statement = $db->prepare($query2);

		$statement->bindValue(':Team_id', $teamID);
		$statement->bindValue(':Week_id', $weekNumber);
		$statement->bindValue(':proj_spread', $projectedSpread);

		$statement->execute();

		$spreadID = $db->lastInsertId("Spread_id_seq");

		//Analysis
		$query3 = "UPDATE Analysis
		SET Team_id = :Team_id, Week_id = :Week_id, spread_id = :spread_id, score_id = :score_id, spreaddifference = :spreaddifference
		WHERE Team_id = " . $teamID . " AND Week_id = " . $weekNumber . ";";
		//get spreadDifference
		$spreadDifference = $projectedSpread - $actualSpread;

		$statement->prepare($query3);

		$statement->bindValue(':Team_id', $teamID);
		$statement->bindValue(':Week_id', $weekNumber);
		$statement->bindValue(':spread_id', $spreadID);
		$statement->bindValue(':score_id', $scoreID);
		$statement->bindValue(':spreaddifference', $spreadDifference);

		$statement->execute();

		echo "Scores successfully updated.";
	}

	catch(Exception $ex) {
		echo "Error with DB. DetailsL $ex";
		die();
	}
}
}
}
?>
