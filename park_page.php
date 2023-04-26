<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8"/>
    <title>Canada Unknown</title>

    <base target="_blank">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;700&family=Yellowtail&family=Poppins&display=swap" rel="stylesheet">

    <style>

      body {
        font-family: 'Noto Sans JP';
        font-weight: 300;
      }

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

      #headingImage {
        text-shadow: 2px 2px 5px white;
        padding: 350px 10px 10px;
        background-repeat: no-repeat;
        background-size: cover;
      }

      #headingImage h1, #headingImage p {
        display: inline;
      }

      #headingImage p {
        position: relative;
        margin-left: 15px;
        z-index: 1;
      }
    
      h1, h2 {
        font-family: 'Poppins';
      }

      #main {
        margin-bottom: 100px;
        margin-right: calc(100vw / 50);
        margin-left: calc(100vw / 50);
        text-align: left;
      }

      img {
        width: 700px;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      .caption {
        font-size: 12px;
        color: gray;
        margin-top: -3px;
        margin-bottom: 10px;
        width: 700px;
        position: relative;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      .caption a {
        position: absolute;
        right: 0px;
      }

      #titleCaption {
        width: 100%;
        text-align: right;
      }
    </style>
  </head>

  <body>

    <iframe id = "header" src="header.php" frameBorder = "0"></iframe>
    <iframe id = "menu" src = "menu.php" frameBorder = "0"></iframe>

    <?php
      require "load_park_page.php";
    ?>

    <script>
      var header = document.getElementById("header");
      var menu = document.getElementById("menu");
      var all = document.getElementsByTagName("body");
      var heading = document.getElementsByTagName("h1");
      var subheading = document.getElementsByTagName("h2");

      if (navigator.userAgent.match(/iPhone/i)  || navigator.userAgent.match(/Android/i)) {
        header.style.height = "200px";
        menu.style.height = "200px";

        all[0].style.fontSize = "35px";
        heading[0].style = fontSize = "70px";
        for (var i = 0; i < subheading.length; i++) {
          subheading[i].style.fontSize = "55px";
        }
      } else {
        header.style.height = "75px";
        menu.style.height = "75px";

        all[0].style.fontSize = "16px";
        heading[0].style = fontSize = "32px";
        for (var i = 0; i < subheading.length; i++) {
          subheading[i].style.fontSize = "24px";
        }
      }
    </script>
  </body>
</html>
