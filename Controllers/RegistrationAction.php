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
$_SESSION['er9']="";
$_SESSION['er10']="";
$_SESSION['er11']="";
$_SESSION['er12']="";
$_SESSION['er13']="";
$_SESSION['er14']="";
$_SESSION['er15']="";
$_SESSION['email']="";

$isValid = true;

$name = sanitize($_POST['name']);
$gender = sanitize($_POST['gender']);
$institution = sanitize($_POST['institution']);
$role = sanitize($_POST['role']);
$class = sanitize($_POST['class']);
$experience = sanitize($_POST['experience']);
$contact = sanitize($_POST['cnum']);
$email	= sanitize($_POST['email']);
$subject	= sanitize($_POST['subject']);
$location = sanitize($_POST['location']);
$salary	= sanitize($_POST['salary']);
$password = sanitize($_POST['password']);
$cpassword = sanitize($_POST['cpassword']);

if(empty($name)){
	$_SESSION['er1']="Please Provide your Name";
	$isValid= false;
	}
if(empty($gender)){
		$_SESSION['er2']="Please Select your Gender";
		$isValid= false;
		}
if(empty($institution)){
		$_SESSION['er3']="Please Provide your Instituion Name";
		$isValid= false;
		}
if(empty($role)){
		$_SESSION['er4']="Please Select your role";
		$isValid= false;
		}

if(empty($class) && $role == "Student"){
		$_SESSION['er5']="Please Enter your Class";
		$isValid= false;
		}

if(empty($experience) && $role == "Tutor"){
		$_SESSION['er5']="Please Enter your Experience";
		$isValid= false;
		}

if(empty($contact)){
		$_SESSION['er7']="Please Provide Your Contact Number";
		$isValid= false;
		}

if(empty($email)){
	$_SESSION['er8']="Please Provide a valid Email";
	$isValid= false;
	}
	else
	{ $_SESSION['email']=$email;}

if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {

	} else {
		$_SESSION['er8'] = "Invalid email address";
	}

if(empty($subject)){
		$_SESSION['er9']="Please Enter your Class";
		$isValid= false;
		}

if(empty($location)){
		$_SESSION['er10']="Please Enter your Class";
		$isValid= false;
		}

if(empty($salary)){
		$_SESSION['er11']="Please Enter your Salary";
		$isValid= false;
		}

if(empty($password)){
	$_SESSION['er12']="Please Provide Password!!";
	$isValid= false;
	}

if(empty($cpassword)){
	$_SESSION['er13']="Please Provide Confirm Password!!";
	$isValid= false;
	}
	
if($password !== $cpassword){
	$_SESSION['er13']="Password Not Macthed!!";
	$isValid= false;
	}

if(strlen($password)<6){
	$_SESSION['er12']="Password cant not be less than 6 characters";
	$isValid= false;
	}

if($isValid === true)
	{
	 $result =insertUser($name,$gender,$institution,$role,$class,$experience,$contact,$email,$subject,$location,$salary,$password);
	if($result === true)
	{
	$_SESSION['er14']="Registration Successfull.....Let's Nacho"; 
	header("location: ../Views/Registration.php");}
	else
	{ $_SESSION['er14']="Registration Failed!!!!";
	header("location: ../Views/Registration.php");
	}
	}
	else{
		$_SESSION['er15']="Not Inserted into Valid Condition!!!!";
	header("location:../Views/Registration.php");}

function sanitize($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);

	return $data;
	}
?>