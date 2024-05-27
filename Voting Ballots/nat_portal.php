<?php

$message=null;

session_start();

if (!isset($_SESSION['id'])){
 header('Location: ../login page/Login_Page_OTP.php');
}



$nat_party = null;
if($_SERVER['REQUEST_METHOD'] == "POST") {

    include "connect.php";

    if (isset($_POST['Party1'])){
        $nat_party = "African National Congress";
    }elseif (isset($_POST['Party2'])){
        $nat_party = "Economic Freedom Fighters";
    }
    elseif (isset($_POST['Party3'])){
        $nat_party = "Democratic Alliance";
    }
    elseif (isset($_POST['Party4'])){
        $nat_party = "uMkhonto we Sizwe";
    }
    elseif (isset($_POST['Party5'])){
        $nat_party = "Inkatha Freedom Party";
    }
    elseif (isset($_POST['Party6'])){
        $nat_party = "African Democratic Change";
    }
    elseif (isset($_POST['Party7'])){
        $nat_party = "Freedom Front Plus";
    }
    elseif (isset($_POST['Party8'])){
        $nat_party = "Build on SA";
    }
    elseif (isset($_POST['Party9'])){
        $nat_party = "ActionSA";
    }
    elseif (isset($_POST['Party10'])){
        $nat_party = "African Christian Democratic Party";
    }
    elseif (isset($_POST['Party11'])){
        $nat_party = "Rise Mzansi";
    }
    elseif (isset($_POST['Party12'])){
        $nat_party = "Pan Africanist Congress of Azania";
    }
    elseif (isset($_POST['Party13'])){
        $nat_party = "United Democratic Movement";
    }
    elseif (isset($_POST['Party14'])){
        $nat_party = "Good (political party)";
    }
    elseif (isset($_POST['Party15'])){
        $nat_party = "Patriotic Alliance";
    }
    elseif (isset($_POST['Party16'])){
        $nat_party = "Independent Civic Organisation of South Africa";
    }
    elseif (isset($_POST['Party17'])){
        $nat_party = "African People Convention";
    }
    elseif (isset($_POST['Party18'])){
        $nat_party = "United Independent Movement";
    }
    elseif (isset($_POST['Party19'])){
        $nat_party = "Abantu Batho Congress";
    }
    elseif (isset($_POST['Party20'])){
        $nat_party = "National Coloured Congress";
    }
    elseif (isset($_POST['Party21'])){
        $nat_party = "Forum for Service Delivery";
    }
    elseif (isset($_POST['Party22'])){
        $nat_party = "United Christian Democratic Party";
    }

    echo $nat_party;

    if ($nat_party){
         $sql = $sql = "SELECT * FROM `national_voting_ballot` WHERE `national_parties` = '$nat_party';";

        $result = mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);

        if($num > 0){
            $row = $result->fetch_assoc();
            $total = (int)$row["number_of_votes"] + 1;
            $sql = "UPDATE `national_voting_ballot` SET `number_of_votes`='$total' WHERE `national_parties` = '$nat_party';";
            $result = mysqli_query($con, $sql);
            echo"choice added";
            header("Location: prov_votingballot.php");

        }
        

    }else{
        $message = '<p style="color:red"><strong>*Please select a party/organisation to proceed*</strong></p>';
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Voting</title>
    <link rel="stylesheet" href="nat_portal.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="nat_images/VotaMzansi_resized_resized.png" alt="logo">
        </div>
        <div class="menu_links" id="menu_links">
            <ul>
                <li><a href="#">Voting</a></li>
                <li><a href="#">Parties and Candidates</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </div>
    </nav>
    <form action="nat_portal.php" method="post">
        <div class="container">
            <?php echo $message ;?>
            <h1>National voting ballot</h1>
            <p>*You can only select one party/organisation of your choice</p>
            <div class="Parti">
                <img src="nat_images/anc.jpg" alt="party logo" class="Partilogo">
                <p>African National Congress</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                            <!-- <input type="radio" id="ANC_select" name="Select1" class="Xchecked"> -->
                        </div>
                        <input type="radio" id="ANC_select" name="Party1" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/eff.png" alt="party logo" class="Partilogo">
                <p>Economic Freedom Fighters</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="EFF_select" name="Party2" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/da.png" alt="party logo" class="Partilogo">
                <p>Democratic Alliance</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="DA_select" name="Party3" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/MK.png" alt="party logo" class="Partilogo">
                <p>uMkhonto we Sizwe</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="MK_select" name="Party4" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/ifp.jpeg" alt="party logo" class="Partilogo">
                <p>Inkatha Freedom Party</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="IFP_select" name="Party5" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/African_Democratic_Change_logo.png" alt="party logo" class="Partilogo">
                <p>African Democratic Change</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ADC_select" name="Party6" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/ffp.jpeg" alt="party logo" class="Partilogo">
                <p>Freedom Front Plus</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="FFP_select" name="Party7" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/BOSA_LOGO_WEBSITE.png" alt="party logo" class="Partilogo">
                <p>Build One SA</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="BOSA_select" name="Party8" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/actionsa.png" alt="party logo" class="Partilogo">
                <p>ActionSA</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ASA_select" name="Party9" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/ACDP_logo.png" alt="party logo" class="Partilogo">
                <p>African Christian Democratic Party</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ACDP_select" name="Party10" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/RISE_Mzansi_logo.jpg" alt="party logo" class="Partilogo">
                <p>Rise Mzansi</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="RISE_select" name="Party11" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/Pan_Africanist_Congress_of_Azania_flag.png" alt="party logo" class="Partilogo">
                <p>Pan Africanist Congress of Azania</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="PACA_select" name="Party12" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/UDM_SA_logo.png" alt="party logo" class="Partilogo">
                <p>United Democratic Movement</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="UDM_select" name="Party13" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/GOOD.png" alt="party logo" class="Partilogo">
                <p>Good (political party)</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="GOOD_select" name="Party14" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/PA_logo.png" alt="party logo" class="Partilogo">
                <p>Patriotic Alliance</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="PA_select" name="Party15" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/ICOSA_logo.png" alt="party logo" class="Partilogo">
                <p>Independent Civic Organisation of South Africa</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ICOSA_select" name="Party16" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/African_Peoples_Convention_logo.png" alt="party logo" class="Partilogo">
                <p>African People's Convention</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="APC_select" name="Party17" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/UnitedIndependentMovement.png" alt="party logo" class="Partilogo">
                <p>United Independent Movement</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="UIM_select" name="Party18" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/Abantu-Batho-Congress-logo.png" alt="party logo" class="Partilogo">
                <p>Abantu Batho Congress</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ABC_select" name="Party19" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/Cape_Coloured_Congress_Logo.png" alt="party logo" class="Partilogo">
                <p>National Coloured Congress</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="NCC_select" name="Party20" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/Forum for Service Delivery.png" alt="party logo" class="Partilogo">
                <p>Forum for Service Delivery</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="FSD_select" name="Party21" class="Xchecked">
                    </div>
                </div>
            </div>
            <div class="Parti">
                <img src="nat_images/United Christian Democratic Party.png" alt="party logo" class="Partilogo">
                <p>United Christian Democratic Party</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="nat_images/X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="UCDP_select" name="Party22" class="Xchecked">
                    </div>
                </div>
            </div>
            <p>
                *Please ensure you have read and understand the <a href="\Group Project Today\Terms and Conditions.pdf">terms & conditions</a>
                outlined under the voting section.
            </p>
            <div class="_2buttons">
                <button class="cancel_button" id="cancel_button">Cancel</button>
                <button type="submit" class="Proceed_button" id="Proceed_button" onclick="window.location.href='prov_votingballot.php';">Proceed</button>
            </div>
            
        </div>
    </form>
    <script src="nat_buttons2.js"></script>
</body>
</html>