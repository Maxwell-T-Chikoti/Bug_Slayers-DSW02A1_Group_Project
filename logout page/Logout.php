<?php
$message = null;

$id_number = null;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

  include 'connect.php';

  $id_number = $_POST["id_number"];


  $sql = "Select * from `users_registration_info` where id_number='$id_number'"; //query to go through the table.

  $result = mysqli_query($con, $sql);

  if ($result) {
    $num = mysqli_num_rows($result); //counts the number of rows in the table
    if ($num > 0) { //if there's already the same ID number in the table, then...
      
      $sql = "delete from `users_registration_info` where id_number='$id_number'";
      $result = mysqli_query($con,$sql);
      if($result){
        session_start();
        $_SESSION['id'] = $row["id"];
        echo '<script>window.location.href="http://127.0.0.1:5500/group%20project%20with%20home%20page/homepage.html";</script>';
      } 


    } else {

      $message = '<body><div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
        <strong>Invalid </strong> information.
        </div></body>';
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
  <title>Vota Mzansi</title>

  <link rel="stylesheet" href="logout_style.css">
  
</head>


  <nav>
    <div class="logo">
        <img src="VotaMzansi_resized_resized.png" alt="logo">
    </div>
    <div class="reg_button">
        <button id="back_to_homepage" onclick="window.location.href= 'http://127.0.0.1:5500/results%20page/hompage.html';">Back</button>
    </div>
  </nav>

  <div id="icon">
    <img src="logout-icon.png" alt="" id="icon_">
  </div>
  <p id="logout_warning" style="color: darkblue">*Once logged out,<strong> you will be removed </strong>from the list of registered voters*</p>
  <div class="container" id="container" style="min-height: 280px">
    <div class="form-container login-container">
      <form action="Logout.php" method="post" id="login_form">
        <h1>logout</h1>
        <p>Enter Your ID number to logout</p>
        <span id="invalid_message"><?php echo $message; ?></span>
        <input type="text" id="id_number" placeholder="National ID Number" required id="ID_number" name="id_number" value="<?php echo $id_number ?>">
        <button id="logoutBtn">Logout</button>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        
      </div>
    </div>
  </div>
  <script src="logoutpage.js"></script>
</body>

</html>