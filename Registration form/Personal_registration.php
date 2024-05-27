<?php
$message = null;

if($_SERVER['REQUEST_METHOD'] == "POST") {

    include 'connect.php';

    $first_name=$_POST['first_name'];
    $second_name=$_POST['second_name'];
    $last_name=$_POST['last_name'];
    $id_number=$_POST['id_number'];
    $phone_number=$_POST['phone_number'];
    $email=$_POST['email'];
    $date_of_birth=$_POST['date_of_birth'];
    

    $sql = "Select * from `users_registration_info` where id_number='$id_number'"; //query to go through the table 

    $result = mysqli_query($con,$sql);
    
    if($result){
      $num=mysqli_num_rows($result); //counts the number of rows in the table
      if($num>0){ //if there's already the same ID number in the table, then...

        $message='<p style="color: red"><strong>*Credentials already registered*</strong></p>';

      }else{
        $sql = "insert into `users_registration_info`(first_name, second_name, last_name, id_number, phone_number, email, date_of_birth) 
        values('$first_name', '$second_name', '$last_name', '$id_number', '$phone_number', '$email', '$date_of_birth')";

        $result = mysqli_query($con,$sql);
        if($result){
            session_start();
            $_SESSION['id_number'] = $id_number;

            header('Location: Residential_registration.php');
        } 
      }
    }

}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="Personal_registration_style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="images1/VotaMzansi_resized_resized.png" alt="logo">
        </div>
        <div class="menu_links" id="menu_links">
            <ul>
                <li><a href="#">Voting</a></li>
                <li><a href="#">Parties and Candidates</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </div>
        <div class="reg_button">
            <button onclick="window.location.href= 'http://127.0.0.1:5500/group%20project%20with%20home%20page/homepage.html';">Home Page</button>
        </div>
        <div class="menu_icon" id="menu_icon">
            <img src="images1/white_menu_icon.png" alt="menu">
        </div>
    </nav>


    <div class="Registercontainer">
        <h3 id="info_nav">Personal information <br> <a href="#">Residential</a>.<a href="#">Security</a></h3>

        <?php echo $message ;?>

        <form action="Personal_registration.php" method="post">
            <div class="row">
                <div class="column">
                    <label>First Name</label>
                    <input type="text" placeholder="Example : David" required id="First_name" name="first_name">
                </div>
        
                <div class="column">
                    <label>Second Name <span class="optional">(optional)</span></label>
                    <input type="text" placeholder="Example : Katleho" id="Second_name" name="second_name">
                </div>

                <div class="column">
                    <label>Last Name</label>
                    <input type="text" placeholder="Example : Nkosi" required id="Last_name" name="last_name">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Birth Date</label>
                    <input type="date" placeholder="Year / Month / Day" required id="DOB" name="date_of_birth">
                </div>

                <div class="column">
                    <label>ID Number</label>
                    <input type="text" placeholder="Example : 13-digits" required id="Id_number" maxlength="13" name="id_number">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Phone Number</label>
                    <div class="phonecntainer">
                        <button class="flag"><img src="images1/south-africa.png" alt=""> <p>+27</p></button>
                    <input type="text" placeholder="Example : +27123456789" required id="Phone_number" name="phone_number"> 
                    </div>
                </div>
                <div class="column">
                    <label>Email</label>
                    <input type="text" placeholder="Example : youremail@gmail.com" id="Email" name="email">
                </div>
            </div>

            <div class="Circles">
                <div class="circle">
                    <img src="circle_green.png" alt=".">
                </div>
                <div class="circle">
                    <a href="Residential_registration.php"><img src="circle.png" alt=""></a>
                </div>
                <div class="circle">
                    <a href="Security_registration.php"><img src="circle.png" alt=""></a>
                </div>
            </div>

            <button class="Proceed_btn" id="Proceed_btn">Proceed</button>
        </form>
    </div>
    <script src="buttons.js"></script>
</body>
</html>