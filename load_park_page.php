<?php

  //CONNECT TO DATABASE + FIGURE OUT WHAT DATA TO DISPLAY ----------------------

  require "connect_db_localhost.php";

  $queryUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
  sscanf($queryUrl, "parkid=%d", $id);
  $sql = "SELECT id, name, province, title_image, known_for, getting_there, accessibility, camping, useful_links
  FROM list WHERE id = " . $id;
  $activities = "SELECT park_id, activity_name FROM activities WHERE park_id = " . $id;


  //DISPLAY DATA ---------------------------------------------------------------

  //NORMAL STUFF
  $result = $conn->query($sql); 
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

      echo
      "<div id = 'headingImage' style = 'background-image: url(\"" . $row["title_image"] . "\")'>" //background image
      . "<h1>" . $row["name"] . "</h1>" //park title
      . "<p>" . $row["province"] . "</p></div>"
      . "<div id = 'main'>" //main body div
      . "<br><br><h2>What It's Known For</h2>"
      . $row["known_for"]
      . "<br><h2>Activities</h2>";
    }
  }

  //ACTIVITIES
  $activitiesResult = $conn->query($activities); 
  if ($activitiesResult->num_rows > 0) {
    while ($row = $activitiesResult->fetch_assoc()) {
      echo "<li>" . $row["activity_name"] . "</li>";
    } 
  } else echo "0 activities";

  //NORMAL STUFF AGAIN
  $result = $conn->query($sql); 
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

      echo
      "<br><h2>How To Get There</h2>"
      . "Accessibility Level: "
      . $row["accessibility"] . "<br>"
      . $row["getting_there"]
      . "<br><br><h2>Camping/Accommodations</h2>"
      . $row["camping"]
      . "<br><br><h2>Useful Links</h2>"
      . $row["useful_links"]
      . "</div>";
    }

  } else echo "0 results";


  $conn->close();
?>
