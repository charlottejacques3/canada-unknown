<!DOCTYPE html>
<html>

  <head>
    <meta charset='utf-8' />
    <title>Canada Unknown</title>
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
        width: 70%;
        height: 70%;
        top: 15%;
        left: 15%;
        background-color: white;
        z-index: 1;
        position: fixed;
      }

      #closeGenerator { /*park generator close button*/
        position: fixed;
        top: calc(15% + 15px);
        right: calc(15% + 15px);
        z-index: 2;
      }

      #header {
        width: 100%;
      }

      #menu {
        position: absolute;
        top: 0px;
        right: 0px;
        width: 100%;
        z-index: 2;
      }

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
    </div><br>

    <div id = "margin"></div>

    <div id = "mobileButtons"><button id = "mapButton">Map</button>
    <button id = "listButton">List</button></div>

    <br>
    <div class = "embed-container mapList">
      <iframe id = "map" frameborder = "0" scrolling = "no" marginheight = "0" marginwidth = "0" title = "UNDERRATED PARKS"
      src = "//www.arcgis.com/apps/Embed/index.html?webmap=d1b7195df49e458bb9e30c87412df1fe&extent=-134.0747,37.8901,-37.0435,69.6409&zoom=true&previewImage=false&scale=true&disable_scroll=false&theme=light"></iframe>
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
        }

        var hidePopUp = function() {
          generator.style.display = "none";
        }

        openGenerator.addEventListener("click", showPopUp);
        closeGenerator.addEventListener("click", hidePopUp);


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

        
        //header + fontsize differences for desktop and mobile
        var header = document.getElementById("header");
        var menu = document.getElementById("menu");
        var buttons = document.getElementsByTagName("button");

        if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/Android/i)) {
          header.style.height = "200px";
          menu.style.height = "200px";
          for (var i = 0; i < buttons.length; i++) {
            buttons[i].style.fontSize = "30px";
          }
        } else {
          header.style.height = "75px";
          menu.style.height = "75px";
          for (var i = 0; i < buttons.length; i++) {
            buttons[i].style.fontSize = "14px";
          }
        }


        //check which stylesheet to call        
        var w = window.innerWidth;
        var style = document.getElementById("style");
        if (w > 600 && !navigator.userAgent.match(/iPhone/i) && !navigator.userAgent.match(/Android/i)) 
          style.href = "desktop_layout.css";
        else style.href = "mobile_layout.css";
      }

      layout();

    </script>

	</body>
</html>
