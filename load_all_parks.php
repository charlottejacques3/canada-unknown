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
	echo "<br><br>Connected successfully <br><br>";

	$sql = "SELECT name, province FROM parks_list";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		echo "<table> <tbody>";

		//output data of each row
		while ($row = $result->fetch_assoc()) {
			$divId = "works";
			echo "<tr id = '" . $divId . "'>"
			. "<th> <h3>" . $row["name"]. "</h3>"
			. $row["province"]
			. "</th> </tr>";
		}

		echo "</tbody> </table>";

	} else {
		echo "0 results";
	}

	$conn->close();

?>
