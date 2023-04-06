<!DOCTYPE html>
<html>

  <head>
    <meta charset='utf-8' />
    <title>Discover Parks</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&family=Poppins&display=swap" rel="stylesheet">
    <style>

      #generator { /*park generator iframe and close button*/
        display: none;
      }

      button {
        background-color: rgb(28, 84, 48);
        color: white;
        border: none;
        padding: 4px 20px;
        border-radius: 4px;
        font-family: "Noto Sans JP", sans-serif;
      }

      #buttonDiv {
        text-align: center;
      }

      #popup { /*park generator iframe*/
        width: 475px;
        height: 70%;
        top: 15%;
        left: calc((100% - 475px)/2);
        background-color: white;
        z-index: 1;
        position: fixed;
      }

      #closeGenerator { /*park generator close button*/
        position: fixed;
        top: calc(15% + 15px);
        right: calc((100% - 475px)/2 + 15px);
        z-index: 2;
      }

      #header {
        width: 100%;
        height: 75px;
      }

      #menu {
        position: absolute;
        top: 0px;
        right: 0px;
        width: 100%;
        height: 75px;
        z-index: 2;
      }

      /* #search {
        position: absolute;
        left: 2%;
        z-index: 1;
      }

      #filterForm {
        display: none;
      }

      #filterButton {
        width: 46px;
        z-index: 1;
      } 

      #margin {
        width: 50%;
        display: none;
      } */
    </style>
    <link rel = "stylesheet" type = "text/css" id = "style"></link>
  </head>

	<body onresize = "layout()">

    <iframe id = "header" src="header.php" frameBorder = "0"></iframe>
    <iframe id = "menu" src = "menu.php" frameBorder = "0"></iframe>


    <div id = "buttonDiv"><button type="button" name="button" id = "generatorButton">Where Should I Go?</button></div>
    <div id = "generator">
      <iframe id = "popup" src="park_generator.php"></iframe>
      <button type="close" name="close" id = "closeGenerator">X</button>
    </div>

    <!-- <button type = "button" name = "button" id = "filterButton">Filter</button>

    <br>

    <form action = "parks_list.php" method = "post" id = "filterForm">
      <input type = "checkbox" name = "province[]" id = "bc" value="British Columbia">
      <label for = "bc">British Columbia</label>

      <input type = "checkbox" name = "province[]" id = "ab" value="Alberta">
      <label for = "ab">Alberta</label>

      <input type = "checkbox" name = "province[]" id = "sk" value="Saskatchewan">
      <label for = "sk">Saskatchewan</label>

      <input type = "checkbox" name = "province[]" id = "mb" value="Manitoba">
      <label for = "mb">Manitoba</label>

      <input type = "checkbox" name = "province[]" id = "on" value="Ontario">
      <label for = "on">Ontario</label><br>

      <input type = "checkbox" name = "province[]" id = "qc" value="Quebec">
      <label for = "qc">Quebec</label>

      <input type = "checkbox" name = "province[]" id = "nb" value="New Brunswick">
      <label for = "nb">New Brunswick</label>

      <input type = "checkbox" name = "province[]" id = "ns" value="Nova Scotia">
      <label for = "ns">Nova Scotia</label>

      <input type = "checkbox" name = "province[]" id = "pei" value="Prince Edward Island">
      <label for = "pei">Prince Edward Island</label><br>

      <input type = "checkbox" name = "province[]" id = "nl" value="Newfoundland and Labrador">
      <label for = "nl">Newfoundland and Labrador</label>

      <input type = "checkbox" name = "province[]" id = "yt" value="Yukon">
      <label for = "yt">Yukon</label>

      <input type = "checkbox" name = "province[]" id = "nt" value="Northwest Territories">
      <label for = "nt">Northwest Territories</label>

      <input type = "checkbox" name = "province[]" id = "nu" value="Nunavut">
      <label for = "nu">Nunavut</label><br>

      <input type = "submit" name = "filterResults">
    </form> -->

    <br>

    <div id = "margin"></div>

    <div id = "mobileButtons"><button id = "mapButton">Map</button>
    <button id = "listButton">List</button></div>

    <br>
    <div class = "embed-container mapList">
      <iframe id = "map" frameborder = "0" scrolling = "no" marginheight = "0" marginwidth = "0" title = "UNDERRATED PARKS"
      src = "//www.arcgis.com/apps/Embed/index.html?webmap=d1b7195df49e458bb9e30c87412df1fe&extent=-180,11.9238,8.6335,77.5545&zoom=true&previewImage=false&scale=true&disable_scroll=false&theme=light"></iframe>
    </div>

    <iframe src="list.php" frameborder="0" id = "list" class = "mapList"></iframe>

    <br>

    <script type = "text/javascript">

      var layout = function() {

        //park generator
        var generator = document.getElementById("generator");
        var frame = document.getElementById("popup");
        var form = frame.contentWindow.document.getElementById("test");

        var openGenerator = document.getElementById("generatorButton");
        var closeGenerator = document.getElementById("closeGenerator");

        var showPopUp = function() {
          generator.style.display = "block";
          // form.style.color = "blue";
        }

        var hidePopUp = function() {
          generator.style.display = "none";
        }

        openGenerator.addEventListener("click", showPopUp);
        closeGenerator.addEventListener("click", hidePopUp);


        //toggle filters hide and show
        // var filterButton = document.getElementById("filterButton");
        // var filterForm = document.getElementById("filterForm");
        // var margin = document.getElementById("margin");
        // var filterHeight = filterForm.offsetHeight;
        // margin.style.height = filterHeight + "px";
        // var counter = 0;

        // var showFilters = function() {
        //   if (filterForm.style.display === "none" || filterForm.style.display === "") {
        //     filterForm.style.display = "block";
        //     margin.style.display = "block";
        //     filterHeight = filterForm.offsetHeight;
        //     margin.style.height = filterHeight + "px";
        //     console.log("appearing " + counter);
        //   }
        //   else {
        //     filterForm.style.display = "none";
        //     margin.style.display = "none";
        //     console.log("disappearing " + counter);
        //   }
        //   counter++;
        // }
        // filterButton.addEventListener("click", showFilters);

        //map/list view toggle for mobile view
        var map = document.getElementById("map");
        var mapButton = document.getElementById("mapButton");
        var showMap = function () {
          list.style.display = "none";
          map.style.display = "block";
          listButton.style.backgroundColor = "rgb(223, 237, 221)";
          listButton.style.color = "black";
          mapButton.style.backgroundColor = "rgb(28, 84, 48)";
          mapButton.style.color = "white";
        }
        mapButton.addEventListener("click", showMap);

        var list = document.getElementById("list");
        var listButton = document.getElementById("listButton");
        var showList = function () {
          map.style.display = "none";
          list.style.display = "block";
          list.style.height =  list.contentWindow.document.body.scrollHeight + "px";
          mapButton.style.backgroundColor = "rgb(223, 237, 221)";
          mapButton.style.color = "black";
          listButton.style.backgroundColor = "rgb(28, 84, 48)";
          listButton.style.color = "white";
        }
        listButton.addEventListener("click", showList);


        //check which stylesheet to call        
        var w = window.innerWidth;
        var style = document.getElementById("style");
        if (w > 600) style.href = "desktop_layout.css";
        else style.href = "mobile_layout.css";
      }

      layout();

    </script>

	</body>
</html>
