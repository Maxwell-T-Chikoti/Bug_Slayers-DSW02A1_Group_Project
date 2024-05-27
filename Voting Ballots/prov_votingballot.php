<?php

$message=null;

session_start();

if (!isset($_SESSION['id'])){
 header('Location: ../login page/Login_Page_OTP.php');
}

$prov_party = null;
if($_SERVER['REQUEST_METHOD'] == "POST") {

    include "connect.php";

    if (isset($_POST['Select1'])){
        $prov_party = "African National Congress";
    }elseif (isset($_POST['Select2'])){
        $prov_party = "Economic Freedom Fighters";
    }
    elseif (isset($_POST['Select3'])){
        $prov_party = "Democratic Alliance";
    }
    elseif (isset($_POST['Select4'])){
        $prov_party = "uMkhonto we Sizwe";
    }
    elseif (isset($_POST['Select5'])){
        $prov_party = "Inkatha Freedom Party";
    }
    elseif (isset($_POST['Select6'])){
        $prov_party = "African Democratic Change";
    }
    elseif (isset($_POST['Select7'])){
        $prov_party = "Freedom Front Plus";
    }
    elseif (isset($_POST['Select8'])){
        $prov_party = "Build on SA";
    }
    elseif (isset($_POST['Select9'])){
        $prov_party = "ActionSA";
    }
    elseif (isset($_POST['Select10'])){
        $prov_party = "African Christian Democratic Party";
    }
    elseif (isset($_POST['Select11'])){
        $prov_party = "Rise Mzansi";
    }
    elseif (isset($_POST['Select12'])){
        $prov_party = "Pan Africanist Congress of Azania";
    }
    elseif (isset($_POST['Select13'])){
        $prov_party = "United Democratic Movement";
    }
    elseif (isset($_POST['Select14'])){
        $prov_party = "Good (political party)";
    }
    elseif (isset($_POST['Select15'])){
        $prov_party = "Patriotic Alliance";
    }
    elseif (isset($_POST['Select16'])){
        $prov_party = "Independent Civic Organisation of South Africa";
    }
    elseif (isset($_POST['Select17'])){
        $prov_party = "African People Convention";
    }
    elseif (isset($_POST['Select18'])){
        $prov_party = "United Independent Movement";
    }
    elseif (isset($_POST['Select19'])){
        $prov_party = "Abantu Batho Congress";
    }
    elseif (isset($_POST['Select20'])){
        $prov_party = "National Coloured Congress";
    }
    elseif (isset($_POST['Select21'])){
        $prov_party = "Forum for Service Delivery";
    }
    elseif (isset($_POST['Select22'])){
        $prov_party = "United Christian Democratic Party";
    }


    if ($prov_party){
         $sql = $sql = "SELECT * FROM `provincial_voting_ballot` WHERE `parties` = '$prov_party';";

        $result = mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);

        if($num > 0){
            $row = $result->fetch_assoc();
            $total = (int)$row["vote_number"] + 1;
            $sql = "UPDATE `provincial_voting_ballot` SET `vote_number`='$total' WHERE `parties` = '$prov_party';";
            $result = mysqli_query($con, $sql);
            echo"choice added";
            header('Location: Thank_you.html');

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
    <title>Provincial Voting Ballot</title>
    <link rel="stylesheet" href="prov_votingballot.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="prov_images/VotaMzansi_resized_resized.png" alt="logo">
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

    <form action="prov_votingballot.php" method="post">
        <div class="container">
            <?php echo $message ;?>
            <h1>Provincial voting ballot</h1>
            <p>*You can only select one party/organisation of your choice</p>

            <div class="parties">
                <img src="prov_images/prov_ANC.png" alt="party logo" class="Partilogo">
                <p>African National Congress</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ANC_select" name="Select1" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_eff.png" alt="party logo" class="Partilogo">
                <p>Economic Freedom Fighters</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="EFF_select" name="Select2" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_da.png" alt="party logo" class="Partilogo">
                <p>Democratic Alliance</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="DA_select" name="Select3" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_MK.png" alt="party logo" class="Partilogo">
                <p>uMkhonto we Sizwe</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="MK_select" name="Select4" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_INKHANTA.png" alt="party logo" class="Partilogo">
                <p>Inkatha Freedom Party</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="IFP_select" name="Select5" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_ADC.jpg" alt="party logo" class="Partilogo">
                <p>African Democratic Change</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ADC_select" name="Select6" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_Oros.png" alt="party logo" class="Partilogo">
                <p>Freedom Front Plus</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="FFP_select" name="Select7" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_BOSA.jpeg" alt="party logo" class="Partilogo">
                <p>Build One SA</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="BOSA_select" name="Select8" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_Action SA.png" alt="party logo" class="Partilogo">
                <p>ActionSA</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ASA_select" name="Select9" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_ACDP.png" alt="party logo" class="Partilogo">
                <p>African Christian Democratic Party</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ACDP_select" name="Select10" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_RISE.jpg" alt="party logo" class="Partilogo">
                <p>Rise Mzansi</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="RISE_select" name="Select11" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_PAC.png" alt="party logo" class="Partilogo">
                <p>Pan Africanist Congress of Azania</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="PACA_select" name="Select12" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_UDM.png" alt="party logo" class="Partilogo">
                <p>United Democratic Movement</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="UDM_select" name="Select13" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_GOOD.png" alt="party logo" class="Partilogo">
                <p>Good (political party)</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="GOOD_select" name="Select14" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_Patriotic_Alliance.png" alt="party logo" class="Partilogo">
                <p>Patriotic Alliance</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="PA_select" name="Select15" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_ICOSA.png" alt="party logo" class="Partilogo">
                <p>Independent Civic Organisation of South Africa</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ICOSA_select" name="Select16" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_APC.png" alt="party logo" class="Partilogo">
                <p>African People's Convention</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="APC_select" name="Select17" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_UDM.png" alt="party logo" class="Partilogo">
                <p>United Independent Movement</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="UIM_select" name="Select18" class="Xchecked">
                    </div>

                </div>
            </div>
            <div class="parties">
                <img src="prov_images/prov_ABC.png" alt="party logo" class="Partilogo">
                <p>Abantu Batho Congress</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="ABC_select" name="Select19" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_NCC.jpeg" alt="party logo" class="Partilogo">
                <p>National Coloured  </p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="NCC_select" name="Select20" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_F4S.jpeg" alt="party logo" class="Partilogo">
                <p>Forum for Service Delivery</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="FSD_select" name="Select21" class="Xchecked">
                    </div>
                </div>
            </div>

            <div class="parties">
                <img src="prov_images/prov_UCDP.png" alt="party logo" class="Partilogo">
                <p>United Christian Democratic Party</p>
                <div class="radio-tile-group">
                    <div class="input_container">
                        <div class="Xtoggle">
                            <img src="prov_images/prov_X-mark-elections.png" alt="Voting X" class="X">
                        </div>
                        <input type="radio" id="UCDP_select" name="Select22" class="Xchecked">
                    </div>
                </div>
            </div>

            <p>
                *Please ensure you have read and understand the terms & conditions
                outlined under the voting section.
                <!-- <a href="Resources\Terms and Conditions.pdf">ok</a> -->
            </p>
            <div class="proceed-btn">
                <button type="submit" class="Proceed_button" id="Proceed_button" onclick="window.location.href='http://127.0.0.1:5500/Voting%20Ballots/Thank_you.html';">Submit</button>
            </div>
            
        </div>
    </form>
    <script src="prov_ballotpages.js"></script>
</body>
</html>