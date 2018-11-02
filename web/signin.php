<?php  
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>
<body>
	<form name="sign in" method="post">
		User Name: <input type="text" name="name">
		Password: <input type="text" name="password">
		<input type="submit" name="sign in" value="Submit">
	</form>
	<?php  
	$name = $_POST['name'];
	$password = $_POST['password'];
	if (password_verify($password, $_SESSION['password'])) {
	}
	else{
		
	}
	?>
</body>
</html>