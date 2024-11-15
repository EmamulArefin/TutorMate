<?php 
session_start();
require '../Models/userI.php';

$_SESSION['er1']="";
$_SESSION['er2']="";
$_SESSION['er3']="";
$_SESSION['er4']="";
$_SESSION['er5']="";
$_SESSION['er6']="";
$_SESSION['er7']="";
$_SESSION['er8']="";

$isValid = true;

$name = sanitize($_POST['name']);
$institution = sanitize($_POST['institution']);
$experience = sanitize($_POST['experience']);
$contact = sanitize($_POST['cnum']);
$subject = sanitize($_POST['subject']);
$location = sanitize($_POST['location']);
$salary	= sanitize($_POST['salary']);
$email = $_SESSION['email'];

if(empty($name)){
	$_SESSION['er1']="Please Provide your Name";
	$isValid= false;
	}

if(empty($institution)){
		$_SESSION['er2']="Please Provide your Instituion Name";
		$isValid= false;
		}

if(empty($experience)){
		$_SESSION['er3']="Please Enter your Experience ";
		$isValid= false;
		}

if(empty($contact)){
		$_SESSION['er4']="Please Provide Your Contact Number";
		$isValid= false;
		}

if(empty($subject)){
		$_SESSION['er5']="Please Enter your Class";
		$isValid= false;
		}

if(empty($location)){
		$_SESSION['er6']="Please Enter your Class";
		$isValid= false;
		}

if(empty($salary)){
		$_SESSION['er7']="Please Enter your Salary";
		$isValid= false;
		}


if($isValid === true)
	{
	 $result =updateInfoT($name,$email,$institution,$experience,$contact,$subject,$location,$salary);
	if($result === true)
	{
	$_SESSION['er8']="Information Successfully Updated "; 
	header("location: ../Views/UpdateInfoT.php");}
	else
	{ $_SESSION['er8']="Update Failed!!!!";
	header("location: ../Views/UpdateInfoT.php");
	}
	}
	else{
		$_SESSION['er8']="Not Inserted into Valid Condition!!!!";
	header("location:../Views/UpdateInfoT.php");}

function sanitize($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);

	return $data;
	}
?>