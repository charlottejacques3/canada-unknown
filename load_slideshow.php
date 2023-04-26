<?php 
    require "connect_db.php";

    $sql = "SELECT id, title_image FROM list";

    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<img src = '" . $row["title_image"] . "'>";
        }
    }
?>