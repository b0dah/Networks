<!-- <html><body><h1>It works!</h1></body></html> -->
<?php 
		$server = "127.0.0.1";//"localhost";
		$dbUsername = "root";
		$password = "q]/z.q]/z.";
		$dbname = "Airline";

$connection = mysqli_connect($server, $dbUsername, $password, $dbname);

if (!isset($_COOCKIE['id'])){
	if (isset($_POST['submit'])) {

		$userUsername = mysqli_real_escape_string($connection, trim($_POST['username']));
		$userPassword = mysqli_real_escape_string($connection, trim($_POST['password']));

		if (!empty($userUsername) && !empty($userPassword)) {
			$query = "SELECT `id`, `username` FROM `Users` WHERE 
			username = '$userUsername' AND password = SHA('$userPassword')";

			$data = mysqli_query($connection, $query);

			if (mysqli_num_rows($data) == 1){
				/**/
				$row = mysqli_fetch_assoc($data);

				setcookie('id', row['id'], time() + (60*60*24*30) );
				setcookie('username', row['username'], time() + (60*60*24*30) );
				/**/

				$homeUrl = 'http://' . $_SERVER['HTTP_HOST'];
				header('Location: '. $homeUrl);

			}
			else {
				echo 'wrong username / password';
			}

		}
		else {
			echo "Fill all the fields";
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

<?php 
	if (empty($_COOCKIE['username'])) {
?>

	<form class="box" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >

		  <h1>Login</h1>
		  <input type="text" name="username" placeholder="Username">
		  <input type="password" name="password" placeholder="Password">
		  <input type="submit" name=submit" value="Login">

		  <a href="signUp.php"> <h5>Register</h5> </a>
	</form>
<?php 
}
else {
	echo 'coockies exist';

}

?>
</body>
</html>