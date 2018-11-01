<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<form name="sign up" method="post">
		Name: <input type="text" name="name">
		Password: <input type="text" name="password">
		<input type="submit" name="sign up" value="Submit">
	</form>
	<?php 
	require("dbConnect.php");
	$db = get_db();
	$name = $_POST['name'];
	$password = $_POST['password'];
	$newUrl = "signin.php";

	if(isset($name) && isset($password)) {
		$query = "INSERT INTO web_users (user_name, password)
		VALUES(:name, :password);";

		$statement = $db->prepare($query);

		$statement->bindValue(':name', $name);
		$statement->bindValue(':password', $password);

		$statement->execute();
		//header('location'.$newUrl);
	}



	?>
</body>
</html>