<?php  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TA05</title>
</head>
<body>
	<div>
		<span>Search for a Book in our database.</span>
		<form id="form" method="post" action="">
			Book: <input type="text" name="book" id="book">
			<br>
			<button type="submit" form="form">Submit</button>
			<br>
	<?php 
		$book = $_POST['book'];
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
				if ($row['book'] == $book) {				
			echo "<strong>" $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "</strong><a href=\"scripturedetails.php\" onclick=\"SESSION['id'] = $row['id']\"></a><br>";
			}
		}
	?>
		</form>
		<a href=""></a>
	</div>
</body>
</html>