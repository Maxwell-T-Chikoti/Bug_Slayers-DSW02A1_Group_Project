<?php
$message = null;
$message_id = null;
$done = null;


if($_SERVER['REQUEST_METHOD'] == "POST") {

    include 'connect.php';

    $first_name=$_POST['first_name'];
    $second_name=$_POST['second_name'];
    $last_name=$_POST['last_name'];
    $id_number=$_POST['id_number'];
    $phone_number=$_POST['phone_number'];
    $email=$_POST['email'];    

    $sql = "Select * from `users_registration_info` where id_number='$id_number'"; //query to go through the table 

    $result = mysqli_query($con,$sql);
    
    if($result){
      $num=mysqli_num_rows($result); //counts the number of rows in the table
      if($num>0){ //if there's already the same ID number in the table, then...
        $sql = "UPDATE `users_registration_info` 
        SET `first_name`='$first_name',`second_name`='$second_name',`last_name`='$last_name',`phone_number`='$phone_number',`email`='$email' 
        WHERE `id_number`='$id_number'";

        $result = mysqli_query($con,$sql);
        if($result){
            session_start();
            $_SESSION['id_number'] = $id_number;
            $done = '<script>alert("Changes successfully applied")</script>';


        }

      }else{

        $message = '<p style="color: red"><strong>*Changes could not be applied*</strong></p>';
        $message_id = '<p style="color: red"><i>enter correct ID number</i><p>';
        }
    }

}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit personal information</title>
    <link rel="stylesheet" href="update_info.css">
</head>
<body>
    <?php echo $done;?>
    <nav>
        <div class="logo">
            <img src="VotaMzansi_resized_resized.png" alt="logo">
        </div>
        <div class="menu_links" id="menu_links">
            <ul>

            </ul>
        </div>
        <div class="reg_button">
            <button onclick="window.location.href= 'http://127.0.0.1:5500/group%20project%20with%20home%20page/homepage.html';">Back</button>
        </div>
        <div class="menu_icon" id="menu_icon">
            <img src="images1/white_menu_icon.png" alt="menu">
        </div>
    </nav>


    <div class="Registercontainer">
        <h3 id="info_nav">Edit personal information <br></h3>

        <p style="color: darkblue">*Enter new/old credentials*</p>

        <form action="update_info.php" method="post">
            <div class="row">
                <div class="column">
                    <label>ID number <span class="id_required">(required*)</span></label>
                    <input type="text" placeholder="Example : 13-digits" required id="First_name" name="id_number">
                </div>
        
                <div class="column">
                    <label>First Name</label>
                    <input type="text" placeholder="" required id="First_name" name="first_name">
                </div>

                <div class="column">
                    <label>Second Name</label>
                    <input type="text" placeholder="" id="Second_name" name="second_name">
                </div>

                <div class="column">
                    <label>Last Name</label>
                    <input type="text" placeholder="" required id="Last_name" name="last_name">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label>Phone Number</label>
                    <div class="phonecntainer">
                        <button class="flag"><img src="south-africa.png" alt=""> <p>+27</p></button>
                    <input type="text" placeholder="Example : +27123456789" required id="Phone_number" name="phone_number"> 
                    </div>
                </div>
                <div class="column">
                    <label>Email</label>
                    <input type="text" placeholder="Example : youremail@gmail.com" required id="Email" name="email">
                </div>
            </div>

            <div class="Circles">
                <div class="circle">
                    
                </div>
                <div class="circle">
                    <a href="Residential_registration.php"></a>
                </div>
                <div class="circle">
                    <a href="Security_registration.php"></a>
                    <?php echo $message ;?>
                    <?php echo $message_id ;?>
                </div>
            </div>

            <button type="submit" class="Proceed_btn" id="Proceed_btn">Apply</button>
        </form>
    </div>
    <script src="buttons.js"></script>
</body>
</html>