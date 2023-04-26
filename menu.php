<!DOCTYPE html>
<html lang="en" dir="ltr">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&family=Poppins&display=swap" rel="stylesheet">
<style media="screen">

  #optionDiv {
    font-family: 'Poppins', 'Geneva', sans-serif;
  }

  .bar {
    background-color: black;
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
        <div class = "bar"></div><div class = "bar"></div><div class = "bar"></div></li>
      <div id = "optionDiv">
      <li class = "options"><a href = "index.php" target = "_top">Home</a></li>
      <li class = "options"><a href = "parks_list.php" target = "_top">Discover Parks</a></li></div>
    </ul>

    <script type="text/javascript">


      var whole = document.getElementById("wholeMenu");

      var resize = function() {
        var w = window.innerWidth;

        if (w > 600 && !navigator.userAgent.match(/iPhone/i) && !navigator.userAgent.match(/Android/i)) {
          backToNormal();
        }
        else if (options[0].style.display != "block") {
          for(var i = 0; i < options.length; i++) {
            options[i].style.display = "none";
          }
          menuIcon.style.display = "block";
        }

        //check which stylesheet to call
        if (w > 600 && !navigator.userAgent.match(/iPhone/i) && !navigator.userAgent.match(/Android/i)) sheet.href = "desktop_menu.css";
        else sheet.href = "";
      }

      var showMenu = function() {

        //toggle between showing and hiding menu
        if(options[0].style.display === "none") {

          for(var i = 0; i < options.length; i++) {
            options[i].style.display = "block";
          }
          for(var i = 0; i < body.length; i++) {
            body[i].style.background = "rgba(223, 237, 221, 1)";
          }
          parent.document.getElementById("menu").style.height = "100%"; //set height to 100%
          parentPage[0].style.overflow = "hidden"; //prevent overflow

          //alignment of menu text
          optionDiv.style.textAlign = "left";
          optionDiv.style.position = "absolute";
          optionDiv.style.top = "25%";
          if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/Android/i))
            optionDiv.style.fontSize = "100px";
          else
            optionDiv.style.fontSize = "50px";


        } else {
          backToNormal();
          for(var i = 0; i < options.length; i++) {
            options[i].style.display = "none";
          }
        }

      }

      var backToNormal = function() {
        for(var i = 0; i < body.length; i++) {
            body[i].style.background = "rgba(223, 237, 221, 0)";
          }

          //set back to original height
          if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/Android/i)) 
            parent.document.getElementById("menu").style.height = "200px"; 
          else
            parent.document.getElementById("menu").style.height = "75px"; 
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


      //header + fontsize differences for desktop and mobile
      var bar = document.getElementsByClassName("bar");

      if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/Android/i)) {
        for (var i = 0; i < bar.length; i++) {
          bar[i].style.width = "90px";
          bar[i].style.height = "12px";
          bar[i].style.margin = "15px";
        }
      } else {
        for (var i = 0; i < bar.length; i++) {
          bar[i].style.width = "35px";
          bar[i].style.height = "5px";
          bar[i].style.margin = "6px";
        }
      }
    </script>
  </body>
</html>
