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

    /* input[type = checkbox] {
      visibility: hidden;
      appearance: none;
      background-color: rgb(28, 84, 48);
      border-radius: 4px;
    }

    input[type = checkbox]:checked {
      background-color: rgb(28, 84, 48);
    } */

    #label {
      /* display: none; */
      /* color: white; */
      background: rgb(28, 84, 48);
      /* border-radius: 4px; */
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
    Select keywords that interest you and parks will be recommended!

    <?php
      require "generate_options.php";
    ?>

    <script>
      // var button = document.getElementById("test");
      // var form = document.getElementById("form");
      // var testClear = function() {
      //   form.reset();
      //   console.log("clearing");
      // }
      // button.addEventListener("click", testClear);
    </script>
  </body>
</html>
