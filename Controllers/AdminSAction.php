<?php

$conn = mysqli_connect("localhost", "root", "", "tutormate");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']); 

    
    $sql = "DELETE FROM student WHERE ID = $user_id";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the admin view page after successful deletion
        header("Location: ../Views/AdminS.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
