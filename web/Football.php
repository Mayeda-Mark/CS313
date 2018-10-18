<!DOCTYPE html>
<html>
<head>
	<title>Football Spreads</title>
</head>
<body>
	<div>
		<span>I'll put an expplanation here.</span>
		<br>
		<span>Select an NFL Team</span>
		<br>
		<form id="Team" name="Team" method="post" action="">
			<select>
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
				<option value="Jaksonville Jaguars">Jacksonville Jaguars</option>
				<option value="Indianapolis Colts"></option>
				<option value="Tennesse Titans">Tennesse Titans</option>
				<option value="Tampa Bay Buccaneers">Tamps Bay Buccaneers</option>
			</select>
			<br>
			<button type="submit" form="Team">Submit</button>
		</form>
		<br>
	<?php 
		$teamName = $_POST['Team'];
		try {
			$dbUrl = getenv('DATABASE_URL');
			$dbOpts = parse_url($dbUrl);

			$dbHost = $dbOpts["host"];
 			$dbPort = $dbOpts["port"];
 			$dbUser = $dbOpts["user"];
 			$dbPassword = $dbOpts["pass"];
 			$dbName = ltrim($dbOpts["path"],'/');

			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $ex){
  			echo 'Error!: ' . $ex->getMessage();
  			die();
		}
		$query1 = "SELECT * FROM Team WHERE Name = '" . $teamName . "';";
		foreach ($db->query($query1) as $team) {
			$teamID = $team['id'];
		}
		$query2 = "SELECT * FROM Analysis WHERE Team_id = '" . $teamID . "';";
		foreach ($db->query($query2) as $row) {			
			echo $row['Week_id'] .  " " . $row['Spread_id'] . " " . $row['Score_id'] . " " . $row['spreadDifference'];
		}
	?>

	</div>
</body>
</html>