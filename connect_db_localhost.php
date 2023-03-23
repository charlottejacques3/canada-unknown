<?php

$servername = "localhost";
$username = "root";
$password = "1ntr@Net?cpstN";
$db = "uparks";

//create connection
$conn = new mysqli($servername, $username, $password, $db);

//check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "<br><br>Connected successfully <br><br>";

?>
