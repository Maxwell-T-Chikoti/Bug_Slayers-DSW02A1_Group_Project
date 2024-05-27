<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landingpage.css">
    <title>Countdown Landing Page with Game</title>
   
</head>
<body>
    <nav>
        <div class="logo">
            <img src="VotaMzansi_resized_resized.png" alt="logo">
        </div>
        <div class="menu_links" id="menu_links">
            
        </div>
    </nav>
    <div class="countdown-container">
        <div class="countdown" id="countdown"></div>
        <div class="message" id="message" style="display: block;">Get ready for the voting! whilst you wait <br> entertain yourself with these questions!</div>
        <div class="message" id="down_arrow" style="display: none;">
            <img src="down-icon.png" alt="">
        </div>
    </div>
    <div class="quiz-container">
        <div id="intruction" style="display: none;">Proceed to the ballots and vote for your prefered party</div>
        <div class="question" id="question" style="display: block;"></div>
        <button class="button" id="answer_true" style="display: block;" onclick="checkAnswer(true)">True</button>
        <button class="button" id="answer_false" style="display: block;" onclick="checkAnswer(false)">False</button>
        <div class="score" id="score" style="display: block;"></div>

        <div class="proceed_btn" id="vote">
            <button class="button" id="proceed" style="display: none;" onclick="window.location.href = 'http://localhost/Group%20Project%20Today%20official/Voting%20Ballots/nat_portal.php';">Proceed to Vote</button>
        </div>
    </div>


    <script src="landingpage.js"></script>
</body>
</html>
