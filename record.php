
<html>
<head>
	<title></title>
	<link href="styles/prettyStyle.css" rel="stylesheet" type="text/css"> 
</head>


<body>


</body>
</html>


<?php
		$servername = "127.0.0.1";//"localhost";
		$username = "root";
		$password = "q]/z.q]/z.";
		$dbname = "Airline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Cart (from, to)
VALUES ('Paris', 'Milan')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

