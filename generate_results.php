<?php

  echo "
  <link rel='preconnect' href='https://fonts.googleapis.com'>
  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
  <link href='https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&family=Poppins&display=swap' rel='stylesheet'>

  <style>

    body {
      margin: 20px;
      -webkit-text-size-adjust: 100%;
    }
    a:link, a:visited {
      color: black;
      text-decoration: none;
    }

    a:hover, a:active {
      text-decoration: underline;
      color: black;
    }

    table {
      width: 100%;
    }

    h2, h3 {
      font-family: 'Poppins';
    }

  </style>";

  echo "<h2>Recommended Parks</h2>";

  $interests = $_POST["selectedQualities"];
  $stringSelected = implode("','", $interests);

  //figure out which parks have the right features
  function matchingIds($column, $table, $idType, $string) {
    require "connect_db.php";

    $sql = "SELECT $column, $idType FROM $table WHERE $column IN ('$string')";
    $ids = array();

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $ids[] = $row[$idType];
      }
    }

    $conn->close();
    return $ids;
  }

  //create the array of ids to be used
  $provIds = matchingIds("province", "list", "id", $stringSelected);
  $activityIds = matchingIds("activity_name", "activities", "park_id", $stringSelected);
  $featureIds = matchingIds("feature_name", "features", "park_id", $stringSelected);
  $allIds = array_merge($provIds, $activityIds, $featureIds);

  //sort the ids by how frequently they appear
  $countValues = array_count_values($allIds);
  arsort($countValues);
  $sortedIds = array_keys($countValues);
  $orderQuery = implode(", ", $sortedIds);

  require "connect_db.php";
  $sql = "SELECT id, name, province FROM list WHERE id IN (" . $orderQuery . ") ORDER BY FIELD (id, " . $orderQuery . ")";

  //tags function
  function tags($column, $table, $idType, $selectedIds, $currentId, $string) {
    $tagsArray = array();
    require "connect_db.php";
    $request = "SELECT $column FROM $table WHERE $idType LIKE $currentId AND $column IN ('$string')";
    $tagList = $conn->query($request);

    if ($tagList->num_rows > 0) {
      while($row = $tagList->fetch_assoc()) {
        $tagsArray[] = "<span class = 'tags'
        style = '
        background: rgb(172, 198, 232); 
        margin: 3px; 
        font-family: Noto Sans JP; 
        border-radius: 4px;
        padding: 1px 4px
        '>" . $row[$column] . "</span>";
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

        echo "<tr style = 'background: rgb(223, 237, 221);'>"
        . "<th> <a href = 'park_page.php?parkid=" . $id . "' target = '_top'><h3 style = 'font-family: Poppins' class = 'parkName'>" . $row["name"]. "</h3></a>"
        . $tags;
        echo "</th> </tr>";
      }

      echo "</tbody> </table>";
  } else echo "0 results";

  //javascript
  echo 
  "<script>
    var heading = document.getElementsByTagName('h2');
    var parkname = document.getElementsByClassName('parkName');
    var tags = document.getElementsByClassName('tags');

    if (navigator.userAgent.match(/iPhone/i)  || navigator.userAgent.match(/Android/i)) {
      for (var i = 0; i < heading.length; i++) {
        heading[i].style.fontSize = '50px';
      }
      for (var i = 0; i < parkname.length; i++) {
        parkname[i].style.fontSize = '40px';
      }
      for (var i = 0; i < tags.length; i++) {
        tags[i].style.fontSize = '30px';
      }
    } else {
      for (var i = 0; i < heading.length; i++) {
        heading[i].style.fontSize = '30px';
      }
      for (var i = 0; i < parkname.length; i++) {
        parkname[i].style.fontSize = '20px';
      }
      for (var i = 0; i < tags.length; i++) {
        tags[i].style.fontSize = '16px';
      }
    }
    </script>";

  $conn->close();
?>
