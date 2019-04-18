<?php  
$server = "127.0.0.1";//"localhost";
$username = "root";
$password = "q]/z.q]/z.";
$dbname = "Airline";

// Create connection
$connection = new mysqli($server, $username, $password, $dbname);
// Check connection
if (!$connection)
{
	echo "connection error !" . PHP_EOL;
	echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
echo "Connected succesfully";


$query = "SELECT * from Flights";
$result = $connection->query($query);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		echo "<br>" .$row['to']  ;
	}

} else {
	echo " <br> Query result is empty";
}

$connection->close();

?>