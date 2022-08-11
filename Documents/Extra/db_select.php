<?php
$servername = "localhost";
$username = "root";
$password = "1ntr@Net?cpstN";
$db = "parks";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$sql = "SELECT name,province FROM parks_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "name: " . $row["name"]. " - Province: " . $row["province"]. 
 "<br><br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
