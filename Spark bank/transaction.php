<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    if ($amount < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Sorry Negative amount cannot be transferred")';
        echo '</script>';
    } elseif ($amount > $sql1['balance']) {
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';
        echo '</script>';
    } elseif ($amount == 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Sorry Invalid Value cannot be transferred')";
        echo "</script>";
    } else {
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);

        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>


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
  <link rel="stylesheet" href="css/user.css">
  <style>
    #container{
      height: 50%;
    }
    select{
      width: 100%;
      height: 70%;
      border-radius: 10px 10px 0px 0px;
      border: 0px solid;
      text-align: center;
      background: linear-gradient(to right, #40e5da, #724dfa);
    }
    select option{
      width: 100%;
      background: linear-gradient(to bottom, #40e5da, #724dfa);
    }
  </style>
  <title>Transaction</title>
  </head>
<body>
    <div class="container-1">
        <?php include 'navbar.html' ?>
  <div class="table-container">
    <h1 class="heading">Transaction</h1>
    <?php
                include 'connect.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Balance</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label="Id"><?php echo $rows['id'] ?></td>
          <td data-label="Name"><?php echo $rows['name'] ?></td>
          <td data-label="Email"><?php echo $rows['email'] ?></td>
          <td data-label="Balance" class="text-balance"><?php echo $rows['balance'] ?></td>
          
        </tr>
      </tbody>
    </table>
    <div class="container" id="container">
        <input type="checkbox" id="flip" />
        <div class="cover">
          <div class="transfer">
            <img src="images/transfer money.png" alt="" />
          </div>
        </div>
        <div class="forms">
          <div class="form-content">
            <div class="login-form">
              <div class="title">Transfer Money</div>
              <form method="post" name="tcredit">
                <div class="input-boxes">
                  <div class="input-box">
                    <input name="amount" type="number" placeholder="Enter Amount" required />
                  </div>
                  <div class="input-box">
                    <select name="to" class="transfer-user" required>
                      <option value="" disabled selected>Choose</option>
                      <?php
                      include 'connect.php';
                      $sid=$_GET['id'];
                      $sql = "SELECT * FROM users where id!=$sid";
                      $result=mysqli_query($conn,$sql);
                      if(!$result)
                      {
                          echo "Error ".$sql."<br>".mysqli_error($conn);
                      }
                      while($rows = mysqli_fetch_assoc($result)) {
                      ?>
                      <option class="user-name" value="<?php echo $rows['id'];?>"><?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> )</option>
                    <?php 
                } 
            ?>
                      
                    </select>
                  </div>
                  <div class="button input-box">
                    <input name="submit" type="submit" value="Transfer" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <?php include 'footer.html'?>
  </div>
  
</body>
</html>