<?php
$message = null;
$id_number = null;
$email = null;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

  include 'connect.php';

  $id_number = $_POST["id_number"];
  $email = $_POST["email"];
  $password = $_POST["password"];


  $sql = "Select * from `users_registration_info` where id_number='$id_number' and email='$email'"; //query to go through the table.
  //Note: retrieve the hashed password first before verifying it using password_verify()

  $result = mysqli_query($con, $sql);

  if ($result) { //Using password verify to compare the hashed password from the database with the input password
    $num = mysqli_num_rows($result); //counts the number of rows in the table
    if ($num > 0) { //if there's already the same ID number in the table, then...
      $row = $result->fetch_assoc();
      if (password_verify($password, $row["password"])) {

        session_start();
        $_SESSION['id'] = $row["id"];
        echo "<script>window.location.href= 'http://127.0.0.1:5500/login%20page/LandingPage.html';</script>";

      } else {
        $message = '<p style="color: red"><strong>Login failed. </strong>Incorrect login info.</p>'; 
      }
    } else {

      $message = '<p style="color: red"><strong>Login failed. </strong>Incorrect login info.</p>'; 
    }
  }


}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vota Mzansi Login </title>

  <link rel="stylesheet" href="login_OTP_style.css">




</head>

<body>

  <div id="vota">
    <img src="VotaMzansi_resized_resized.png" alt="">
  </div>
  <button id="edit" onclick="window.location.href='http://localhost/Group%20Project%20Today%20official/update/update_info.php'">Edit profile</button>
  <div class="admin_icon">
    <a href="http://localhost/Group%20Project%20Today%20official/admin3/admin_login.php" class="icon_link">
      <img src="admin-icon.png" alt="" id="ad_icon">
    </a>
  </div>


  <div class="container" id="container" style="min-height: 550px">
    <div class="form-container login-container">
      <form action="Login_Page_OTP.php" method="post" id="login_form">
        <h1>login To Vote</h1>
        <input type="email" id="email" placeholder="Email" required id="Email" name="email" value="<?php echo $email ?>">
        <input type="password" id="password" placeholder="Password" required id="password" name="password">
        <input type="text" id="id_num" placeholder="National ID Number" required id="ID_number" name="id_number" value="<?php echo $id_number ?>">
        <div class="content">
          <div class="checkbox">
            <div class="pass-link">
              <br>
              <p>Please fill in your credentials to login</p>
            </div>
          </div>
        </div>
        <button type="submit" id="loginBtn">Login</button>
        <p><?php if (!empty($message)) {
          echo $message;
        } ?></p>
      </form>
      </div>

    <div class="overlay-container">
      <div class="overlay">

      </div>
    </div>
  </div>
  <!-- <div class="admin_icon">
    <a href="">
      <img src="admin-icon.png" alt="" id="ad_icon">
    </a>
  </div> -->

  <script src="loginpage.js"></script>
</body>

</html>