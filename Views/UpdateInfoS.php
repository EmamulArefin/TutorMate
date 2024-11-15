<?php session_start();

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: ../Views/Login.php");
    exit();
    }

    $user_id = $_SESSION['id'];

    $conn = mysqli_connect("localhost", "root", "", "tutormate");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM student WHERE ID = '$user_id'";
    $result = mysqli_query($conn, $sql);

    $userData =[];

    if (mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile Page</title>
    <link rel="stylesheet" href="css/UpdateProfile.css">
    <script src="js/UpdateInfoS.js"></script>
</head>
<body>
    <div class="updateProfile-container">
        <h2>Update Profile</h2>
        <form action="../Controllers/UpdateInfoSAction.php" method="POST" onsubmit="return Valid(this)" novalidate>
            <div class="input-group">
                <label for="name"> Name</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($userData['Full_Name']); ?>">
                <span class="error-message" id="err1"></span>
                <span class="error-message"><?php echo empty($_SESSION['er1'])? " ": $_SESSION['er1']?></span>
            </div>

            <div class="input-group">
                <label for="institution">Institution</label>
                <input type="text" name="institution" id="institution" value="<?php echo htmlspecialchars($userData['Institution']); ?>">
                <span class="error-message" id="err2"></span>
                <span class="error-message"><?php echo empty($_SESSION['er2'])? " ": $_SESSION['er2']?></span>
            </div>

            <div class="input-group">
                <label for="cnum">Contact Number</label>
                <input type="text" name="cnum" id="cnum" value="<?php echo htmlspecialchars($userData['Contact_Number']); ?>">
                <span class="error-message" id="err4"></span>
                <span class="error-message"><?php echo empty($_SESSION['er4'])? " ": $_SESSION['er4']?></span>
            </div>

            <div class="input-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($userData['Location']); ?>">
                <span class="error-message" id="err6"></span>
                <span class="error-message"><?php echo empty($_SESSION['er6'])? " ": $_SESSION['er6']?></span>
                
            </div>

            <div class="input-group">
                <label for="subject">Subject's</label>
                <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($userData['Subject']); ?>">
                <span class="error-message" id="err5"></span>
                <span class="error-message"><?php echo empty($_SESSION['er5'])? " ": $_SESSION['er5']?></span>
                
            </div>

             <div class="input-group" >
                    <label for="class">Class</label>
                    <input type="text" id="class" name="class" value="<?php echo htmlspecialchars($userData['Class']); ?>">
                    <span class="error-message" id="err3"></span>
                    <span class="error-message"><?php echo empty($_SESSION['er3'])? " ": $_SESSION['er3']?></span>
                </div>

            <div class="input-group">
                <label for="salary">Given Salary</label>
                <input type="text" id="salary" name="salary" value="<?php echo htmlspecialchars($userData['Salary']); ?>">
                <span class="error-message" id="err7"></span>
                <span class="error-message"><?php echo empty($_SESSION['er7'])? " ": $_SESSION['er7']?></span>
                
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
		<span class="error-message"><?php echo empty($_SESSION['er8'])? " ": $_SESSION['er8']?></span>
    </div>
</body>
</html>