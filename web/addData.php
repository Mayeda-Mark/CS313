<?php  
//addData.php

function insertData() {
	$db = get_db();
	//Set Variables
	$teamID2 = $_POST['Team2'];
	$weekNumber = $_POST['weekNumber'];
	$score = $_POST['score'];
	$opponentScore = $_POST['opponentScore'];
	$projectedSpread = $_POST['projectedSpread'];
	$actualSpread = $_POST['actualSpread'];
	$iswin = "false";
	$testValue = 0;

	//Only do stuff if there is a team in the second select
	if ($teamID2 != "") {

			//Get teamID
			$query = "SELECT name FROM Team WHERE Name = '" . $teamID2 . "';";
				foreach ($db->query($query) as $team) {

					$teamName2 = $team['name'];
				}

			//Only add if there isn't any data where the week and team match up
			$query4 = "SELECT proj_spread FROM Spread WHERE team_id = " . $teamID . " AND week_id = " . $weekNumber . ";";
				foreach ($db->query($query4) as $spread) {
					$testValue ++;
				}
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

				$statement->execute();

				echo "Scores successfully added.";
			}

			catch(Exception $ex) {
				echo "Error with DB. DetailsL $ex";
				die();
			}
		}//End Add

		//Only edit if there is already data for the week/team match
		if ($testValue) {
			//Begin Edit
			/***************************************************************************************************************************/
			try {
				//Score
				$query1 = "UPDATE Score
				SET TeamScore = :TeamScore, OppScore = :OppScore, realSpread = :realSpread, isWin = :isWin
				WHERE Team_id = " . $teamID . " AND Week_id = " . $weekNumber . ";";
				$statement = $db->prepare($query1);
					//get isWin
					if ($score > $opponentScore) {
						$iswin = "true";
				}

				$statement->bindValue(':TeamScore', $score);
				$statement->bindValue(':OppScore', $opponentScore);
				$statement->bindValue(':realSpread', $actualSpread);
				$statement->bindValue(':isWin', $iswin);

				$statement->execute();

				//Spread
				$query2 = "UPDATE Spread 
				SET Proj_spread = :proj_spread 
				WHERE Team_id = " . $teamID . " AND Week_id = " . $weekNumber . ";";

				$statement = $db->prepare($query2);

				$statement->bindValue(':proj_spread', $projectedSpread);

				$statement->execute();

				//Analysis
				$query3 = "UPDATE Analysis
				SET spreadDifference = :spreadDifference
				WHERE Team_id = " . $teamID . " AND Week_id = " . $weekNumber . ";";
				//get spreadDifference
				$spreadDifference = $projectedSpread - $actualSpread;

				$statement = $db->prepare($query3);

				$statement->bindValue(':spreadDifference', $spreadDifference);

				$statement->execute();

				echo "Scores successfully updated.";
			}

			catch(Exception $ex) {
				echo "Error with DB. DetailsL $ex";
				die();
			}
		}// End edit
	}
}
?>
