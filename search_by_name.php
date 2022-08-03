<?php

  $servername = "localhost";
  $username = "root";
  $password = "1ntr@Net?cpstN";
  $db = "parks";

  //create connection
  $conn = new mysqli($servername, $username, $password, $db);

  //check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Search results start here <br><br>";

  $sql = "SELECT id, name, province FROM parks_list WHERE name LIKE '%" . $_POST["searchBox"] . "%'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo $row["id"] . ". Name: " . $row["name"] . ", Province: " . $row["province"] . "<br>";
    }
  } else {
    echo "0 results";
  }

  echo "<br><br> End of search results<br><br>";

  $conn->close();

?>
