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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/AdminDashboard.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">TutorMate</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#" id="StudentInfo">Student Information</a></li>
                    <li><a href="#" id="TutorInfo">Tutor Information</a></li>
                    <li><a href="../Controllers/Logout.php">LOG OUT</a></li>
                </ul>
            </div>
        </div> 

        <div class="container">
            <div id="info"><h1>Hello Admin, Welcome....</h1></div>
        </div>
    </div>
    

    <script>
         
         document.getElementById('StudentInfo').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='AdminS.php' title='Student View'></iframe>";
        });

        
        document.getElementById('TutorInfo').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='AdminT.php' title='Tutor View'></iframe>";
        });
    </script>
</body>
</html>
