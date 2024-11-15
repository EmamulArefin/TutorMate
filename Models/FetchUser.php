<?php 
function matchdata($email, $password) {
    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "tutormate");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query `student` table
    $sql = "SELECT * FROM student WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Query `tutor` table
    $sql2 = "SELECT * FROM tutor WHERE email = '$email'";
    $result2 = mysqli_query($conn, $sql2);

    // Check if email exists in the `student` table
    if (mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
        return $userData;
    } 
    // Check if email exists in the `tutor` table
    elseif (mysqli_num_rows($result2) > 0) {
        $userData = mysqli_fetch_assoc($result2);
        return $userData;
    } 
    // Return false if email is not found in either table
    else {
        return false;
    }
}
?>
