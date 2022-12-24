<?php

  //CONNECT TO DATABASE + FIGURE OUT WHAT DATA TO DISPLAY ----------------------

  require "connect_db.php";

  $queryUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
  sscanf($queryUrl, "parkid=%d", $id);
  echo $id;
  $sql = "SELECT id, name, province, known_for FROM list WHERE id = " . $id;


  //DISPLAY DATA ---------------------------------------------------------------

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

      //output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["name"] . "</h2>"
        . $row["province"]
        . "<br>"
        . $row["known_for"];
      }

  } else echo "0 results";

  $conn->close();
?>
