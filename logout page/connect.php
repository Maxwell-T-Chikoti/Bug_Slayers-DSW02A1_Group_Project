<?php

$con = new mysqli("localhost","root","","rg_lg_db"); //to connect to the database

if(!$con){
    echo"Can't connect to the database at the moment.";
    die(mysqli_error($con)); //if it fails to connect to the database
}


?>