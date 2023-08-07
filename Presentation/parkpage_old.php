<!DOCTYPE html>
<html>

  <style media="screen">
    #works {
      background-color: rgb(220, 222, 220);
    }
  </style>
  <head>
    <meta charset='utf-8' />
    <title>Discover Parks</title>
    <style>
      #works {
        background-color: rgb(220, 222, 220);
      }

      #map {
        width: 65vw;
        height: 65vh;
      }

      #popup {
        width: 60vw;
        height: 70vh;
        z-index: 1;
        position: fixed;
        top: 15vh;
        left: 20vw;
        background-color: white;
      }

    </style>
  </head>

	<body>

      <input type="submit" name="filterResults">
    </form>

		<?php
      require "load_park_page.php";?>
    <div class="embed-container">
      <iframe id = "map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="UNDERRATED PARKS"
      src="//www.arcgis.com/apps/Embed/index.html?webmap=d1b7195df49e458bb9e30c87412df1fe&extent=-180,11.9238,8.6335,77.5545&zoom=true&previewImage=false&scale=true&disable_scroll=false&theme=light"></iframe>
    </div>

    <button type="button" name="button" id = "generatorButton">Where Should I Go?</button>

    <div id = "generator">
      <iframe id = "popup" src="parkgenerator_old.php"></iframe>
    </div>

    <?php
      require "load_parks_list.php";
		?>

    <script type="text/javascript">
      var generator = document.getElementById("generator");
      generator.style.display = "none";

      var button = document.getElementById("generatorButton");
      var showPopUp = function() {
        generator.style.display = "block";
      };
      button.addEventListener("click", showPopUp);
    </script>

	</body>
</html>