<?php 
session_start();

require '../Models/FetchUser.php';

$_SESSION['ler1'] = "";
$_SESSION['ler2'] = "";
$_SESSION['ler3'] = "";
$_SESSION['email'] = "";
$_SESSION['loggedIn'] = false;

$isValid = true;
$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);

if (empty($email)) {
    $_SESSION['ler1'] = "Please Provide Registered Email";
    $isValid = false;
} else {
    $_SESSION['email'] = $email;
}

if (empty($password)) {
    $_SESSION['ler2'] = "Please Provide Password";
    $isValid = false;
}

if ($isValid) {
    // Admin login check
    if ($email === "admin" && $password === "admin") {
        $_SESSION['loggedIn'] = true;
        header("Location: ../Views/Admin.php");
        exit();
    }
    
    $result = matchdata($email, $password);

    if ($result && $result['Password'] === $password) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['id'] = $result['ID'];

        if ($result['Role'] === "Student") { 
            header("Location: ../Views/StudentDashboard.php");
            exit();
        } else if ($result['Role'] === "Tutor") {
            header("Location: ../Views/TutorDashboard.php");
            exit();
        }
    } else {
        $_SESSION['ler3'] = "Invalid email or Password";
        header("Location: ../Views/Login.php");
        exit();
    }
} else {
    $_SESSION['ler3'] = "Invalid login details. Please check your email and password.";
    header("Location: ../Views/Login.php");
    exit();
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
