<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/logo.png">   
    <script
      src="https://kit.fontawesome.com/c98f2fbcc1.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/user.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User</title>

    </head>
  <body>
  <?php
  include 'connect.php';
  if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $balance = $_POST['balance'];
      $sql = "insert into users(name,email,balance) values('{$name}','{$email}','{$balance}')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
          echo "<script> alert('Hurray! User created');
                                 window.location='transfer.php';
                       </script>";
      }
  }
  ?>

    <div class="container-1">
      <?php include 'navbar.html' ?>

      <div class="container">
        <input type="checkbox" id="flip" />
        <div class="cover">
          <div class="front">
            <img src="images/front.png" alt="" />
          </div>
        </div>
        <div class="forms">
          <div class="form-content">
            <div class="login-form">
              <div class="title">Create User</div>
              <form method="post">
                <div class="input-boxes">
                  <div class="input-box">
                    <input name="name" type="text" placeholder="Name" required />
                  </div>
                  <div class="input-box">
                    <input name="email" type="email" placeholder="Email" required />
                  </div>
                  <div class="input-box">
                    <input name="balance" type="number" placeholder="Balance" required />
                  </div>
                  <div class="button input-box">
                    <input name="submit" type="submit" value="Create" />
                  </div>
                  <div class="button input-box">
                    <input name="reset" type="reset" value="Reset" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php include 'footer.html' ?>
    </div>
   
  </body>
</html>
