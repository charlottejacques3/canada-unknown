<!DOCTYPE HTML>
<html>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
  <style>

  #header {
    position: absolute;
    left: 10px;
    top: -20px;
    font-family: 'Yellowtail', 'Brush Script MT', sans-serif;
    color: green;
    color: rgb(28, 84, 48);
  }

  </style>

  <body>

    <h1 id = "header">Canada Unknown</h1>

    <script>
      var title = document.getElementById("header");

      if (navigator.userAgent.match(/iPhone/i)  || navigator.userAgent.match(/Android/i)) {
        title.style.fontSize = "100px";
        title.style.top = "-70px";
      } else {
        title.style.fontSize = "40px";
        title.style.top = "-20px";
      }

    </script>

  </body>
</html>
