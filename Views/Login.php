<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TutorMate</title>
    <link rel="stylesheet" href="css/test3css.css">
    <script src="js/Valid.js"></script>
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">TutorMate</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="About.php">ABOUT</a></li>
                    <li><a href="ContactUs.php">CONTACT US</a></li>
                </ul>
            </div>

        </div> 
        <div class="content">
            <h1>TutorMate: <br><span>Empowering Your Learning</span> <br>Course</h1>
            <p class="par">Connect with top-notch tutors, explore new subjects, and achieve your goals—all at your own pace.
            
              <br>  Whether you’re looking to boost grades or dive deep into a new topic,
              <br> TutorMate brings expert guidance right to your fingertips. Start learning, start growing.</p>


              <div class="form">
                     <h2>Login Here</h2>
                    <form action="../Controllers/LoginAction.php" method="POST" onsubmit="return Valid(this)" novalidate>
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Enter Email Here">
                        <span id="err1"></span>
                        <span><?php echo empty($_SESSION['ler1']) ? " " : $_SESSION['ler1']; ?></span>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Enter Password Here"> <!-- Added name="password" -->
                        <span id="err2"></span>
                        <span><?php echo empty($_SESSION['ler2']) ? " " : $_SESSION['ler2']; ?></span>
                    </div>
                    <button type="submit" class="btnn">Log In</button>
                    <span><?php echo empty($_SESSION['ler3']) ? " " : $_SESSION['ler3']; ?></span>
                    </form>
                    
                    <p class="link">Don't have an account?<br>
                    <a href="Registration.php">Sign up</a> here</p>
                </div>

        </div>
    </div>
</body>
</html>