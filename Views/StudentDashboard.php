<?php
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: ../Views/Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/StudentDashboard.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">TutorMate</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#" id="Home">HOME</a></li>
                    <li><a href="#" id="Update-Profile">UPDATE PROFILE</a></li>
                    <li><a href="../Controllers/Logout.php">LOG OUT</a></li>
                </ul>
            </div>
        </div> 

        <div class="container">
            <div id="info"></div>
        </div>
    </div>
    

    <script>
        // Ensures the script runs when the window (page) loads
        window.onload = function() {
            document.getElementById('info').innerHTML = "<iframe src='StudentView.php' title='Student View'></iframe>";
        }
         // Update the iframe source on clicking 'Update Profile'
         document.getElementById('Home').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='StudentView.php' title='Student View'></iframe>";
        });

        // Update the iframe source on clicking 'Update Profile'
        document.getElementById('Update-Profile').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='UpdateInfoS.php' title='Update Profile'></iframe>";
        });
    </script>
</body>
</html>
