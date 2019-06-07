<?php
$servername = "127.0.0.1";
$username = "root";
$password = "q]/z.q]/z.";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else echo " <p>connected successfully </p>";

// Create database
$sql = "CREATE DATABASE Presentation";
if ($conn->query($sql) === TRUE) {
    echo " <p> Database created successfully </p>";
} else {
    echo " <p> Error creating database: </p>" . $conn->error;
}

$conn->close();
?>
