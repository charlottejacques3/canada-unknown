<?php

	//FIGURE OUT WHAT DATA TO DISPLAY --------------------------------------------

	//searches
	if (isset($_POST["searchBox"])) {
		$sql = "SELECT name, province FROM parks_list WHERE name LIKE '%" . $_POST["searchBox"] . "%'";
	}

	//filters
	else if (isset($_POST["province"])) {
		$filterResults = $_POST["province"];
		$stringSelected = implode("','", $filterResults);
		$sql = "SELECT name, province FROM parks_list WHERE province IN ('$stringSelected')";
	}

	//all data
	else {
		$sql = "SELECT name, province FROM parks_list";
	}

	//DISPLAY DATA ---------------------------------------------------------------

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
