<!DOCTYPE html>
<html lang="en" dir="ltr">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&family=Poppins&display=swap" rel="stylesheet">
<style media="screen">

  #optionDiv {
    font-family: 'Poppins', 'Geneva', sans-serif;
  }

  /*menu button animation*/
  .bar1, .bar2, .bar3 {
    width: 35px;
    height: 5px;
    background-color: black;
    margin: 6px;
    /* top: 2.75em; */
  }
  .change .bar1 {
    transform: translate(0, 11px) rotate(-45deg);
  }
  .change .bar2 {
    opacity: 0;
  }
  .change .bar3 {
    transform: translate(0, -11px) rotate(45deg);
  }

  #menuIcon {
    position: absolute;
    right: 2.5em;
    top: 1.5em;
  }

  div {
    width : 100%;
  }

  li {
    list-style-type: none;
    margin-left: 30px;
  }

  .options {
    text-align: left;
  }

  a:link, a:visited {
    text-decoration: none;
    color: black;
  }      
      
  a:hover, a:active {
    text-decoration: underline;
    color: black;
  }
</style>
<link rel = "stylesheet" type = "text/css" id = "style"></link>
  <body onresize = "resize()">
    <ul id = "wholeMenu">
      <li id = "menuIcon" >
      <!-- onclick = "showMenu(this)"> -->
        <div class = "bar1"></div><div class = "bar2"></div><div class = "bar3"></div></li>
      <div id = "optionDiv">
      <li class = "options"><a href = "index.php" target = "_top">Home</a></li>
      <li class = "options"><a href = "parks_list.php" target = "_top">Discover Parks</a></li></div>
    </ul>

    <script type="text/javascript">


      var whole = document.getElementById("wholeMenu");

      var resize = function() {
        var w = window.innerWidth;
        console.log('Width' + w);

        if (w > 600) {
          backToNormal();
        }
        else if (options[0].style.display != "block") {
          for(var i = 0; i < options.length; i++) {
            options[i].style.display = "none";
          }
          menuIcon.style.display = "block";
        }

        //check which stylesheet to call
        if (w > 600) sheet.href = "desktop_menu.css";
        else sheet.href = "";
      }

      var showMenu = function() {

        //toggle between menu and x symbol
        // x.classList.toggle("change");
        //toggle between showing and hiding menu
        if(options[0].style.display === "none") {

          // sheet.href = "mobile_menu_clicked.css";

          for(var i = 0; i < options.length; i++) {
            options[i].style.display = "block";
          }
          for(var i = 0; i < body.length; i++) {
            body[i].style.background = "rgba(223, 237, 221, 1)";
          }
          parent.document.getElementById("menu").style.height = "100%"; //set height to 100%
          console.log('xx:'+parent.document.getElementById("menu").style.width);
          parentPage[0].style.overflow = "hidden"; //prevent overflow

          //alignment of menu text
          optionDiv.style.textAlign = "left";
          optionDiv.style.position = "absolute";
          optionDiv.style.top = "25%";
          optionDiv.style.fontSize = "50px";


        } else {
          backToNormal();
          for(var i = 0; i < options.length; i++) {
            options[i].style.display = "none";
          }
        }

      }

      var backToNormal = function() {
        console.log('Width2:' + window.innerWidth);
        console.log("we going back to normal!");
        for(var i = 0; i < body.length; i++) {
            body[i].style.background = "rgba(223, 237, 221, 0)";
          }
          parent.document.getElementById("menu").style.height = "75px"; //set back to original height
          parent.document.getElementById("menu").style.width = "100%";
          parentPage[0].style.overflow = "auto"; //reset scrollbars

          //regular text
          optionDiv.style.fontSize = "16px";
      }

      var body = document.getElementsByTagName("body");
      var options = document.getElementsByClassName("options");
      var menuIcon = document.getElementById("menuIcon");
      var optionDiv = document.getElementById("optionDiv");
      
      var sheet = document.getElementById("style");
      var parentPage = parent.document.getElementsByTagName("body");
      resize();

      //if menu button clicked
      menuIcon.addEventListener("click", showMenu);
    </script>
  </body>
</html>
