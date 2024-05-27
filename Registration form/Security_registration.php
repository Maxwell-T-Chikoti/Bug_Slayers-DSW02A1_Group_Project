<?php

$message = null;

// password_verify($password,$pass); //To check if the input password matches with the password in the DB to login


if($_SERVER['REQUEST_METHOD'] == "POST") {

    include 'connect.php';

    $password=$_POST['password'];
    $id_number=$_POST['id_number'];

    $sql = "Select * from `users_registration_info` where id_number='$id_number'"; //query to go through the table 

    $result = mysqli_query($con,$sql);
    
    if($result){
      $num=mysqli_num_rows($result); //counts the number of rows in the table
      if($num<0){ //if there's already the same ID number in the table, then...
        $message = '<p style="color: red"><strong>*Password already exist*</strong></p>';
      }else{
        $sql = "insert into `users_registration_info`(password) 
        values('$password')";

        $pass =password_hash($password,PASSWORD_DEFAULT);   

        $sql = "UPDATE `users_registration_info` SET `password`='$pass' WHERE id_number='$id_number'";

        $result = mysqli_query($con,$sql);
        if($result){

          echo '<script>window.location.href="http://127.0.0.1:5500/Registration%20form/finish.html";</script>'; //add pop up alert saying "congrats you have successfully registered"

          session_unset();
          //session_destroy();
          
        }/*else{
          die(mysqli_error($con));
        } */
      }
    }

}
session_start();
$id_number=$_SESSION['id_number'];

if($id_number== ''){

    header('Location: Personal_registration.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="Security_registration_style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="images1/VotaMzansi_resized_resized.png" alt="logo">
        </div>
        <div class="menu_links">
            <ul>
                <li><a href="#">Voting</a></li>
                <li><a href="#">Parties and Candidates</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </div>
        <div class="reg_button">
            <p></p>
        </div>
        <div class="menu_icon" id="menu_icon">
            <img src="images1/white_menu_icon.png" alt="menu">
        </div>
    </nav>


    <div class="Registercontainer">
        <h3 id="info_nav">Security information <br> <a href="#">Personal</a>.<a href="#">Residential</a></h3>

        <?php echo $message ;?>

        <form action="Security_registration.php" method="post">
        <input type="text" hidden value="<?php echo $id_number; ?>" name="id_number">
            <div class="row">

                <div class="column">
                    <label>Password <span class="special_characters">(Must contain a special characther !@$%^&*+#)</span></label>
                    <input type="password" placeholder="At least 8 characthers" required id="Street_Name" name="password">
                </div>
            </div>

            <div class="Circles">
                <div class="circle">
                    <a href="Personal_registration.php"><img src="check-circle_greenpng.png" alt=""></a>
                </div>
                <div class="circle">
                    <a href="Residential_registration.php"><img src="check-circle_greenpng.png" alt=""></a>
                </div>
                <div class="circle">
                    <img src="circle_green.png" alt="">
                </div>
            </div>
            <button class="Proceed_btn" id="Proceed_btn2">Finish Registration</button>
        </form>
    </div>
    <script src="buttons.js"></script>
</body>
</html>