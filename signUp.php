
<?php 
		$server = "127.0.0.1";//"localhost";
		$dbUsername = "root";
		$password = "q]/z.q]/z.";
		$dbname = "Airline";

$connection = mysqli_connect($server, $dbUsername, $password, $dbname);

if (isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($connection, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($connection, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($connection, trim($_POST['password2']));

	if ( (!empty($username)) && (!empty($password1)) && (!empty($password2)) && ($password1 == $password2 )) {
		$query = "SELECT * FROM `Users` WHERE username = '$username' ";
		$data = mysqli_query($connection, $query);

		if (mysqli_num_rows($data) == 0) {
			$query = "INSERT INTO `Users` (username, password) VALUES ('$username', '$password1') ";
			mysqli_query($connection, $query);
			echo "Sign up success!";
			mysqli_close($connection);
			exit();
		}
		else {
			echo "already exists";
		}
	}
}

?>

<html>
<head>
	<title></title>
	<link href="styles/prettyStyle.css" rel="stylesheet" type="text/css"> 
</head>


<body>


	<form class="box" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
		<form class="box" action="index.html" method="post">
		  <h1>SIGN UP</h1>
		  <input type="text" name="username" placeholder="Enter your username">

		  <input type="password" name="password1" placeholder="Enter the password">
		  <input type="password" name="password2" placeholder="Enter the password 1 more time">

		  <input type="submit" name="submit" value="Sign up!">
	</form>


</body>
</html>