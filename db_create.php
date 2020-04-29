<!-- creates databade "ExamDB" -->
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connection with server created succesfully"."<br>";

$sql = "CREATE DATABASE IF NOT EXISTS ExamDB";
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

?>

