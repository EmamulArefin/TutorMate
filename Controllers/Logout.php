<?php
	session_start();
	session_start();

 if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: ../Views/Login.php");
    exit();
	}
	session_destroy();
	header("location:../Views/Login.php");
?>