<?php

$servername = "sql5c0f.megasqlservers.com";
$username = "sarsensyst544126";
$password = "mFHGLJqk-@63LCWB";
$db = "Parks_sarsensyst544126";

//create connection
$conn = new mysqli($servername, $username, $password, $db);

//check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "<br><br>Connected successfully <br><br>";

?>
