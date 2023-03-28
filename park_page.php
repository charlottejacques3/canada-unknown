<!DOCTYPE html>
<html>


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
      height: 150px;
    }

    #headingImage {
      text-shadow: 2px 2px 5px white;
      padding: 350px 10px 10px;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    #headingImage h1, #headingImage p {
      display: inline;
    }

    #headingImage p {
      position: relative;
      margin-left: 15px;
    }

    h1, h2 {
      font-family: 'Poppins';
    }

    #main {
      margin-bottom: 100px;
      margin-right: calc(100vw/ 50);
      margin-left: calc(100vw/ 50);
    }
  </style>

  <body>

    <iframe id = "header" src = "header.php"></iframe>
    <br>

    <?php
      require "load_park_page.php";
    ?>
  </body>
</html>
