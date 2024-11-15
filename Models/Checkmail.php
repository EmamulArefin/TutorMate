<?php
$conn = mysqli_connect("localhost", "root", "", "tutormate");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['Email'];

$sql = "SELECT Email FROM student WHERE Email = '$email'";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT Email FROM tutor WHERE Email = '$email'";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0) {
    echo "exists";
} else {
    echo "available";
}

mysqli_close($conn);
?>
