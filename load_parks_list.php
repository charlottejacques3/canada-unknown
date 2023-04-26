<?php

  //CONNECT TO DATABASE + FIGURE OUT WHAT DATA TO DISPLAY ----------------------

  require "connect_db.php";

  //searches
  if (isset($_POST["searchBox"])) {
    $sql = "SELECT id, name, province FROM list WHERE name LIKE '%" . $_POST["searchBox"] . "%'";
  }

  //filters
  else if (isset($_POST["province"])) {
    $filterResults = $_POST["province"];
    $stringSelected = implode("','", $filterResults);
    $sql = "SELECT id, name, province FROM list WHERE province IN ('$stringSelected')";
  }

  //all data
  else $sql = "SELECT id, name, province FROM list";


  //DISPLAY DATA ---------------------------------------------------------------

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    echo "<table id = 'works'><tbody>";

      //output data of each row
      while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        echo "<tr><td>"
        . "<a href = 'park_page.php?parkid=" . $id . "' target = '_top'><h3 class = 'name'>" . $row["name"]. "</h3></a>"
        . "<span class = 'province'>" . $row["province"] . "</span>"
        . "<td></tr>";
      }

      echo "</tbody> </table>";

  } else echo "0 results";

  $conn->close();
?>
