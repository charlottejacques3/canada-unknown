<?php

  $interests = $_POST["selectedQualities"];
  $stringSelected = implode("','", $interests);

  //figure out which parks have the right features
  function matchingIds($column, $table, $idType, $string) {
    require "connect_db_localhost.php";

    $sql = "SELECT $column, $idType FROM $table WHERE $column IN ('$string')";
    $ids = array();

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $ids[] = $row[$idType];
      }
    } else echo "0 results";

    $conn->close();
    return $ids;
  }

  //create the array of ids to be used
  $provIds = matchingIds("province", "list", "id", $stringSelected);
  $activityIds = matchingIds("activity_name", "activities", "park_id", $stringSelected);
  $featureIds = matchingIds("feature_name", "features", "park_id", $stringSelected);
  $allIds = array_merge($provIds, $activityIds, $featureIds);
  echo "The matching id's are " . implode(", ", $allIds);

  //sort the ids by how frequently they appear
  $countValues = array_count_values($allIds);
  arsort($countValues);
  $sortedIds = array_keys($countValues);
  $orderQuery = implode(", ", $sortedIds);
  //echo "<br>The array id's in order are " . $orderQuery;

  require "connect_db_localhost.php";
  $sql = "SELECT id, name, province FROM list WHERE id IN (" . $orderQuery . ") ORDER BY FIELD (id, " . $orderQuery . ")";

  //tags function
  function tags($column, $table, $idType, $selectedIds, $currentId, $string) {
    $tagsArray = array();
    require "connect_db_localhost.php";
    $request = "SELECT $column FROM $table WHERE $idType LIKE $currentId AND $column IN ('$string')";
    $tagList = $conn->query($request);

    if ($tagList->num_rows > 0) {
      while($row = $tagList->fetch_assoc()) {
        $tagsArray[] = "<span style = 'background: rgb(172, 198, 232); margin: 3px;'>" . $row[$column] . "</span>";
      }
    }
    return implode(" ", $tagsArray);
  }


  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<table> <tbody>";

    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $tags = tags("province", "list", "id", $provIds, $id, $stringSelected)
          . tags("activity_name", "activities", "park_id", $activityIds, $id, $stringSelected)
          . tags("feature_name", "features", "park_id", $featureIds, $id, $stringSelected);

        echo "<tr style = 'background: rgb(220, 222, 220);'>"
        . "<th> <a href = 'park_page.php?parkid=" . $id . "' target = '_top'><h3>" . $row["name"]. "</h3></a>"
        . $row["province"]
        . "<br>"
        . $tags;
        echo "</th> </tr>";
      }

      echo "</tbody> </table>";
  } else echo "0 results";
  $conn->close();
?>
