<!DOCTYPE html>
<html>
  <head>

    <meta charset='utf-8' />
    <title>Canada Unknown</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;700&family=Yellowtail&family=Poppins&display=swap" rel="stylesheet">
    <style>

      #header {
        width: 98vw;
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

      h1 {
        font-family: "Poppins";
      }

      body {
        font-family: "Noto Sans JP"; 
      }

      img {
        width: 84%;
        position: relative;
        left: 8%;
        z-index: 1;
      }

      #text {
        margin: 0px 8% 10px;
        text-align: center;
      }
    </style>
  </head>

	<body>

    <iframe id = "header" src="header.php" frameBorder = "0"></iframe>
    <iframe id = "menu" src = "menu.php" frameBorder = "0"></iframe>
    <br>

		<div id = "text">
    <h1 id = "title">Discover Canada's Underrated Parks!</h1>
    Sure, we've all heard of Banff and Jasper, but what about Mount Assinboine or Pukaskwa? If you've ever wanted to
    get away from the crowds and explore Canada's vast wilderness, this website is a great place to start. </div>

    <?php
      require "load_slideshow.php";
    ?>

    <script>

      //slideshow
      var imageNum = 0;
      var images = document.getElementsByTagName("img");

      //initial setup
      for (var i = 1; i < images.length; i++) {
          images[i].style.display = "none";
        }

      var changeImage = function() {
        for (var i = 0; i < images.length; i++) {
          if (i == imageNum) images[i].style.display = "block";
          else images[i].style.display = "none";
        }
        if (imageNum < images.length - 1) imageNum++;
        else imageNum = 0;
      }
      setInterval(changeImage, 5000);

      //header height + font sizes
      var header = document.getElementById("header");
      var menu = document.getElementById("menu");
      var title = document.getElementById("title");
      var text = document.getElementById("text");
      if (navigator.userAgent.match(/iPhone/i)  || navigator.userAgent.match(/Android/i)) {
        header.style.height = "200px";
        menu.style.height = "200px";
        title.style.fontSize = "70px";
        text.style.fontSize = "35px";

      } else {
        header.style.height = "75px";
        menu.style.height = "75px";
        title.style.fontSize = "32px";
        text.style.fontSize = "16px";
      }

    </script>

	</body>
</html>
