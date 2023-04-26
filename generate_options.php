<?php
  function generateQualities($column, $table) {
    require "connect_db.php";

    //calculate the number of rows in the table
    $findRows = "SELECT id FROM $table";
    $rowsResult = $conn->query($findRows);
    $rows = $rowsResult->num_rows;

    //create an array of random id's to call the sql statement
    $optionVals = array();
    if ($rows >= 3) $threshold = 3;
    else $threshold = $rows;

    //checking for duplicates + adding randomly generated values to an array
    $i = 0;
    while ($i < $threshold) {
      $random = rand(1, $rows);
      $checkDupes = "SELECT id, $column FROM $table WHERE id LIKE $random";
      $dupesResult = $conn->query($checkDupes);
      while ($row = $dupesResult->fetch_assoc()) {
        $value = $row[$column];
        if (!in_array($value, $optionVals)) {
          $optionVals[$i] = $value;
          $i++;
        }
      }
    }

    //display the data
    foreach ($optionVals as $v) {
      echo "
      <input type = 'checkbox' name = 'selectedQualities[]' id = '" . $v
      . "' value = '" . $v . "'><label for '" . $v . "'>"
      . $v . "</label><br>";
    }

    $conn->close();
  }

  echo "<form action = 'generate_results.php' method = 'post' id = 'form'>";
  generateQualities("province", "list");
  generateQualities("activity_name", "activities");
  generateQualities("feature_name", "features");
  echo "<br><input type= 'submit' name= 'interests'></form>";
?>
