<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/cssRegi.css">
    <script src="js/ValidRegi.js"></script>
</head>
<body>
    <div class="registration-container">
        <h2>Registration</h2>
        <form action="../Controllers/RegistrationAction.php" method="POST" onsubmit="return Valid(this)" novalidate>
            <div class="input-group">
                <label for="name"> Name</label>
                <input type="text" name="name" id="name">
                <span class="error-message" id="err1"></span>
                <span class="error-message"><?php echo empty($_SESSION['er1'])? " ": $_SESSION['er1']?></span>
            </div>

            <div class="gender">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" id="male" value="Male">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="Female">
                <label for="female">Female</label>
            </div>
            <span class="error-message" id="err2"></span>
            <span class="error-message"><?php echo empty($_SESSION['er2'])? " ": $_SESSION['er2']?></span>

            <div class="input-group">
                <label for="institution">Institution Name</label>
                <input type="text" name="institution" id="institution">
                <span class="error-message" id="err3"></span>
                <span class="error-message"><?php echo empty($_SESSION['er3'])? " ": $_SESSION['er3']?></span>
            </div>


            <div class="role">
                <label for="role">Role</label>
                <input type="radio" name="role" id="student" value="Student" onclick="toggleexperienceInput()">
                <label for="student">Student</label>
                <input type="radio" name="role" id="tutor" value="Tutor" onclick="toggleexperienceInput()">
                <label for="tutor">Tutor</label>
            </div>
    			<span class="error-message" id="err4"></span>
                <span class="error-message"><?php echo empty($_SESSION['er4'])? " ": $_SESSION['er4']?></span>

                <div id="class" style="display: none;">
                    <label for="class">Class</label>
                    <input type="text" id="class" name="class">
                    <span class="error-message" id="err5"></span>
                    <span class="error-message"><?php echo empty($_SESSION['er5'])? " ": $_SESSION['er5']?></span>
                </div>

                <div id="experience" style="display: none;">
                    <label for="experience">Experience</label>
                    <input type="text" id="experience" name="experience">
                    <span class="error-message" id="err14"></span>
                    <span class="error-message"><?php echo empty($_SESSION['er6'])? " ": $_SESSION['er6']?></span>
                </div>

             <script>
             function toggleexperienceInput() {
                const studentRadio = document.getElementById('student');
                const managementRadio = document.getElementById('tutor');
                const classInput = document.getElementById('class');
                const experienceInput = document.getElementById('experience');
                if(studentRadio.checked) {
                    classInput.style.display = 'block';
                } 

                else{
                    classInput.style.display = 'none';
                }

                if (managementRadio.checked) {
                    experienceInput.style.display = 'block';
                } 
                
                else {
                    experienceInput.style.display = 'none';
                }
             }
            </script>

            <div class="input-group">
                <label for="cnum">Contact Number</label>
                <input type="text" name="cnum" id="cnum">
                <span class="error-message" id="err6"></span>
                <span class="error-message"><?php echo empty($_SESSION['er7'])? " ": $_SESSION['er7']?></span>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
                <span class="error-message" id="err7"></span>
                <span class="error-message"><?php echo empty($_SESSION['er8'])? " ": $_SESSION['er8']?></span>
                
            </div>

            <div class="input-group">
                <label for="subject">Subject's</label>
                <input type="text" id="subject" name="subject">
                <span class="error-message" id="err8"></span>
                <span class="error-message"><?php echo empty($_SESSION['er9'])? " ": $_SESSION['er9']?></span>
                
            </div>

            <div class="input-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location">
                <span class="error-message" id="err9"></span>
                <span class="error-message"><?php echo empty($_SESSION['er10'])? " ": $_SESSION['er10']?></span>
                
            </div>

            <div class="input-group">
                <label for="salary">Require Salary</label>
                <input type="text" id="salary" name="salary">
                <span class="error-message" id="err10"></span>
                <span class="error-message"><?php echo empty($_SESSION['er11'])? " ": $_SESSION['er11']?></span>
                
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error-message" id="err11"></span>
                <span class="error-message"><?php echo empty($_SESSION['er12'])? " ": $_SESSION['er12']?></span>
            </div>

            <div class="input-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword">
                <span class="error-message" id="err12"></span>
                <span class="error-message"><?php echo empty($_SESSION['er13'])? " ": $_SESSION['er13']?></span>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
		<div class="log-in">
		<a href="Login.php">Back to Login</a>
		</div>
        <span class="error-message" id="err13"></span>
		<span class="error-message"><?php echo empty($_SESSION['er14'])? " ": $_SESSION['er14']?></span>
        <span class="error-message"><?php echo empty($_SESSION['er15'])? " ": $_SESSION['er15']?></span>
    </div>
</body>
</html>