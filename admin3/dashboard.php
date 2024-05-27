
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <link rel="stylesheet" href="dashstyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
    <div class="container">
        <nav class="nav">
            <button id="menu-button"><img src="menu-burger.png" alt="☰"></button>
            <div class="info">
                <p>.ADMINISTRATOR</p>
                <p>ID : 9202204720082</p>
            </div>
        </nav>
        <aside class="sidebar" id="sidebar">
            <img src="logo.jpg" alt="VotaMzansi" class="logo">
            <div class="menu_links" id="menu_links">
                <button id="Dashboard">Dashboard</button>
                <button id="Statistics"><a href="stats.php">Statistics</a></button>
                <button id="Parties"><a href="parties.php">Parties</a></button>
                <button id="Logout"><a href="http://127.0.0.1:5500/group%20project%20with%20home%20page/homepage.html">Logout</a></button>
            </div>
        </aside>
        <main class="content">
            <div class="column" id="column1">
                <h4>Statistics</h4>
                <div id="numbers"></div>
                <div id="chart1">
                    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                </div>
            </div>
            <div class="column" id="column3">
                <h4>Parties</h4>
                <div id="party-container"></div>
            </div>
        </main>
        <footer class="footer">Administrator</footer>
    </div>
    <script src="sidebar.js"></script>
    <script src="chart.js"></script>
    <script src="loadParties.js"></script>
</body>
</html>
