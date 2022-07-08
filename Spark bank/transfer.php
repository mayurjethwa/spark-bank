<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/logo.png">
  <script
      src="https://kit.fontawesome.com/c98f2fbcc1.js"
      crossorigin="anonymous"
    ></script>
  <link rel="stylesheet" href="css/transfer.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Transfer Money</title>
  </head>
<body>
<?php
    include 'connect.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>
    <div class="container-1">
        <?php include 'navbar.html' ?>
  <div class="table-container">
    <h1 class="heading">Transfer Money</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Balance</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          while($rows=mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <td data-label="Id"><?php echo $rows['id'] ?></td>
          <td data-label="Name"><?php echo $rows['name']?></td>
          <td data-label="Email"><?php echo $rows['email']?></td>
          <td data-label="Balance" class="text-balance"><?php echo $rows['balance']?></td>
          <td class="btn"><a class="btn" href="transaction.php?id= <?php echo $rows['id'] ;?>">Transfer</a></td>
        </tr>
          <?php
            }
          ?>
      </tbody>
    </table>
  </div>
  <?php include 'footer.html'?>
  </div>
  
</body>
</html>