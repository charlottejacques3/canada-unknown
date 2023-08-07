<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&family=Poppins&display=swap" rel="stylesheet">
<style>

      /* table {
        font-family: 'Noto Sans JP', 'Geneva', sans-serif;
        width: 100%;
        text-align: center;
      }

      tr {
        background-color: rgb(223, 237, 221);
      }

      h3 {
        font-family: 'Poppins', 'Geneva', sans-serif;
      }

      a:link, a:visited {
        text-decoration: none;
        color: black;
      }      
      
      a:hover, a:active {
        text-decoration: underline;
        color: black;
      }

      input[type = text] {
        border: none;
        border-bottom: 2px solid rgb(28, 84, 48);
        font-family: "Noto Sans JP", sans-serif;
      }

      input[type = submit] {
        background-color: rgb(28, 84, 48);
        color: white;
        border: none;
        padding: 4px 20px;
        border-radius: 4px;
        font-family: "Noto Sans JP", sans-serif;
      } */

    </style>
  </head>
  <body>

    <form action = "list.php" method = "post" id = "search">
      <input type = "text" name = "searchBox" required placeholder = "Search Parks">
      <input type = "submit" name = "submitSearch" value = "Go">
    </form>

    <?php
      require "load_parks_list.php";
    ?>

    <script>
      var parkname = document.getElementsByClassName("name");
      var province = document.getElementsByClassName("province");
      var searchBar = document.querySelector('input[type="text"]');
      var submitButton = document.querySelector('input[type="submit"]');

      if (navigator.userAgent.match(/iPhone/i)  || navigator.userAgent.match(/Android/i)) {
        for (var i = 0; i < parkname.length; i++) {
          parkname[i].style.fontSize = "40px";
        }
        for (var i = 0; i < province.length; i++) {
          province[i].style.fontSize = "30px";
        }
        searchBar.style.fontSize = "30px";
        submitButton.style.fontSize = "30px";
      } else {
        for (var i = 0; i < parkname.length; i++) {
          parkname[i].style.fontSize = "20px";
        }
        for (var i = 0; i < province.length; i++) {
          province[i].style.fontSize = "16px";
        }
        searchBar.style.fontSize = "16px";
        submitButton.style.fontSize = "16px";
      }
    </script>

  </body>
</html>
