<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home Page</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script
      src="https://kit.fontawesome.com/c98f2fbcc1.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container-1">
      <?php include 'navbar.html' ?>

      <div class="row">
        <div class="col-1">
          <h2>
            Spark <br />
            Bank
          </h2>
          <h3>Transaction Made Easy!!</h3>
          <p>Transfer Money Directly</p>

          <button type="button">
            Learn More<i class="fa-solid fa-arrow-right fa-2x"></i>
          </button>
        </div>
        <div class="col-2">
          <img src="images/bank.png" class="bank" />
          <div class="color-box"></div>
        </div>
      </div>
      <?php include 'footer.html' ?>
    </div>
    <script>
      var menuList = document.getElementById("menuList");
      menuList.style.maxHeight = "0px";
      function togglemenu() {
        if (menuList.style.maxHeight == "0px") {
          menuList.style.maxHeight = "130px";
        } else {
          menuList.style.maxHeight = "0px";
        }
      }
    </script>
  </body>
</html>
