<?php
$servername = "127.0.0.1";
$username = "root";
$password = "q]/z.q]/z.";
$dbname = "Pres";

$tablename = "Personss";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else echo " <p>connected successfully </p>";

// sql to create table
$sql = "CREATE TABLE " . $tablename ."(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "describe " . $tablename;
$result = $conn->query($sql);

echo " <h2> Created table <br><br> </h2>";

echo "<h3>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "field: " . $row["Field"] . "<br>";//. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "</h3>";

$conn->close();
?>
