<?php

$message_admin = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  include "connect.php";

    $id_number_admin = $_POST["id_number_admin"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "Select * from `admin_info` where id_number='$id_number_admin' and password='$password'"; //query to go through the table.
    //Note: retrieve the hashed password first before verifying it using password_verify()
  
    $result = mysqli_query($con, $sql);
  
    if ($result) { //Using password verify to compare the hashed password from the database with the input password
      $num = mysqli_num_rows($result); //counts the number of rows in the table
      if ($num > 0) { //if there's already the same ID number in the table, then...
          echo "<script>window.location.href= 'http://localhost/Group%20Project%20Today%20official/admin3/dashboard.php';</script>";
      }else{
        $message_admin='<body><div class="alert" style="color: red">
        <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
        <strong>Invalid </strong> information.
        </div></body>';
      }
    }

    session_start();
    $id_number_admin=$_SESSION['id_number_admin'];


}

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vota Mzansi Admin</title>

  <link rel="stylesheet" href="Admin_Login.css">
  <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body>
  <div id="vota">
    <img src="VotaMzansi_resized_resized.png" alt="">
  </div>

  <div class="container" id="container">
    <div class="form-container login-container">
      <form action="admin_login.php" method="post">
        <h1>Administrator Login</h1>
        <input type="email" id = "email" placeholder="Email" required id="email" name="email">
        <input type="password" placeholder="Password" required id="pass" name="password">
        <input type="text" placeholder="National ID Number" required id="id_num" name="id_number_admin"> 
        <div class="content">
            <?php echo $message_admin; ?>
        </div>
        <button type="submit" id="loginBtn">Log In</button>
      </form>
    </div>
   
    <div class="overlay-container"> 
      <div class="overlay">
        
      </div>
    </div>
  </div>
<script src="loginpage.js"></script>
</body>
</html>
