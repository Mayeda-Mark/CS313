<!DOCTYPE html>
<html>
<head>
	<title>TA05</title>
</head>
<body>
	<div>
	<?php 
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
		foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures') as $row) {
			echo $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . " \"" . $row['content'] . "\"";
		}
	?>
	</div>
</body>
</html>