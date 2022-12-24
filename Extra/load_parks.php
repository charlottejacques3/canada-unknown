<?php

	//CONNECT TO DATABASE --------------------------------------------------------


	$servername = "localhost";
	$username = "root";
	$password = "1ntr@Net?cpstN";
	$db = "uparks";

	//create connection
	$conn = new mysqli($servername, $username, $password, $db);

	//check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "<br><br>Connected successfully <br><br>";



	//FIGURE OUT WHAT DATA TO DISPLAY --------------------------------------------


	$mainUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	if ($mainUrl == "/parks_list.html") $whichPage = 1;
	else if ($mainUrl == "/park_page.html") $whichPage = 2;

	//main list
	if ($whichPage == 1) {

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
	}

	//individual page
	else if ($whichPage == 2) {
		$queryUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
	  sscanf($queryUrl, "parkid=%d", $id);
		echo $id;
		$sql = "SELECT id, name, province, known_for FROM list WHERE id = " . $id;
	}



	//DISPLAY DATA ---------------------------------------------------------------


	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		if ($whichPage == 1) echo "<table> <tbody>";

			//output data of each row
			while ($row = $result->fetch_assoc()) {

				if ($whichPage == 1) {
					$divId = "works";
					$id = $row["id"];
					echo "<tr id = '" . $divId . "'>"
					. "<th> <a href = 'park_page.html?parkid=" . $id . "' target = '_top'><h3>" . $row["name"]. "</h3></a>"
					. $row["province"]
					. "</th> </tr>";
				}

				else if ($whichPage == 2) {
					echo "<h2>" . $row["name"] . "</h2>"
					. $row["province"]
					. "<br>"
					. $row["known_for"];
				}
			}

			if ($whichPage == 1) echo "</tbody> </table>";

	} else {
		echo "0 results";
	}

	$conn->close();

?>
