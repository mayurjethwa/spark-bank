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
  <title>Transaction History</title>
  </head>
<body>
    <div class="container-1">
        <?php include 'navbar.html' ?>
  <div class="table-container">
    <h1 class="heading">Transaction History</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Sr.No</th>
          <th>Sender</th>
          <th>Receiver</th>
          <th>Amount</th>
          <th>Date & Time</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'connect.php';
        $sql ="select * from transaction";
        $query =mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_assoc($query)){
        ?>
        <tr>
          <td data-label="Sr.No"><?php echo $rows['sno']; ?></td>
          <td data-label="Sender"><?php echo $rows['sender']; ?></td>
          <td data-label="Receiver"><?php echo $rows['receiver']; ?></td>
          <td data-label="Amount" class="text-balance"><?php echo $rows['balance']; ?></td>
          <td data-label="Date & Time"><?php echo $rows['datetime']; ?></td>
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