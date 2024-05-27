<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {

    include 'connect.php';

    $street_number=$_POST['street_number'];
    $street_name=$_POST['street_name'];
    $suburb=$_POST['suburb'];
    $city_or_town=$_POST['city_or_town'];
    $post_code=$_POST['post_code'];
    $province=$_POST['province'];
    $id_number=$_POST['id_number'];

    var_dump($_POST);
    $sql = "Select * from `users_registration_info` where id_number='$id_number'"; //query to go through the table 

    $result = mysqli_query($con,$sql);
    
    if($result){
      $num=mysqli_num_rows($result); //counts the number of rows in the table
      if($num<0){ //if there's already the same ID number in the table, then...
        // echo"Invalid Data";
      }else{
        
        $sql = "UPDATE `users_registration_info` SET `street_number`='$street_number',`street_name`='$street_name',
        `suburb`='$suburb',`city_or_town`='$city_or_town',
        `post_code`='$post_code',`province`='$province' WHERE id_number= '$id_number'";

        $result = mysqli_query($con,$sql);
        if($result){
          header('Location: Security_registration.php');
        }//else{
        //   die(mysqli_error($con));
        // } 
      }
    }

}
session_start();
$id_number=$_SESSION['id_number'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="Residential_registration_style.css">
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
        <h3 id="info_nav">Residential information <br> <a href="#">Personal</a>.<a href="#">Security</a></h3>

        <form action="Residential_registration.php" method="post">
            <input type="text" hidden value="<?php echo $id_number; ?>" name="id_number">
            <div class="row">
                <div class="column">
                    <label>Street Number</label>
                    <input type="text"  required id="Street_Number" name="street_number">
                </div>
                <div class="column">
                    <label>Street Name</label>
                    <input type="text" required id="Street_Name" name="street_name">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Suburb</label>
                    <input type="text" required id="Suburb" name="suburb">
                </div>
                <div class="column">
                    <label>City/Town</label>
                    <input type="text" required id="City/Town" name="city_or_town">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Post Code</label>
                    <input type="text" required id="Post Code" name="post_code">
                </div>
                <div class="column">
                    <label>Province</label>
                    <input type="text" required id="Province" name="province">
                </div>
            </div>

            <div class="Circles">
                <div class="circle">
                    <a href="Personal_registration.php"><img src="check-circle_greenpng.png" alt=""></a>
                </div>
                <div class="circle">
                    <img src="circle_green.png" alt="">
                </div>
                <div class="circle">
                    <a href="Security_registration.php"><img src="circle.png" alt=""></a>
                </div>
            </div>

            <button class="Proceed_btn" id="Proceed_btn2">Proceed</button>
        </form>
    </div>
    <script src="buttons.js"></script>
</body>
</html>