<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Noto Sans JP", sans-serif;
      margin: 20px;
    }

    h2 {
      font-family: "Poppins", sans-serif;
    }

    form {
      margin-top: 30px;
    }

    input[type = checkbox] {
      flex-wrap: wrap;
    }

    input[type = submit] {
      background-color: rgb(28, 84, 48);
      color: white;
      border: none;
      padding: 4px 20px;
      border-radius: 4px;
      font-family: "Noto Sans JP", sans-serif;
      }
  </style>
  <body>
    <h2>Where Should I Go?</h2>
    <p>Select keywords that interest you and parks will be recommended!</p>

    <?php
      require "generate_options.php";
    ?>

    <script>
      var description = document.getElementsByTagName("p");
      var heading = document.getElementsByTagName("h2");
      var optionLabel = document.getElementsByTagName("label");
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      var submitButton = document.querySelector('input[type="submit"]');

      if (navigator.userAgent.match(/iPhone/i)  || navigator.userAgent.match(/Android/i)) {
        for (var i = 0; i < description.length; i++) {
          description[i].style.fontSize = "30px";
        }
        for (var i = 0; i < heading.length; i++) {
          heading[i].style.fontSize = "50px";
        }
        for (var i = 0; i < optionLabel.length; i++) {
          optionLabel[i].style.fontSize = "30px";
          checkboxes[i].style.width = "30px";
          checkboxes[i].style.height = "30px";
        }
        submitButton.style.fontSize = "30px";
      } else {
        for (var i = 0; i < description.length; i++) {
          description[i].style.fontSize = "16px";
        }
        for (var i = 0; i < heading.length; i++) {
          heading[i].style.fontSize = "30px";
        }
        for (var i = 0; i < optionLabel.length; i++) {
          optionLabel[i].style.fontSize = "16px";
          checkboxes[i].style.width = "16px";
          checkboxes[i].style.height = "16px";
        }
        submitButton.style.fontSize = "16px";
      }
    </script>



  </body>
</html>
