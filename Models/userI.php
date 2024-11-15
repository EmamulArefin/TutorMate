<?php

function insertUser($name,$gender,$institution,$role,$class,$experience,$contact,$email,$subject,$location,$salary,$password){
	
    $conn = mysqli_connect("localhost", "root", "", "tutormate");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = false;
	if ($role === "Student"){
	$sql = "INSERT INTO student (Full_Name,Role,Gender,Institution,Contact_Number,Email,Class,Subject,Location,Salary,Password) VALUES ('$name','$role','$gender','$institution','$contact','$email','$class','$subject','$location','$salary',$password)";
    $result = mysqli_query($conn, $sql);
    }

	elseif($role=== "Tutor"){
		$sql = "INSERT INTO tutor (Full_Name,Role,Gender,Institution,Contact_Number,Email,Subject,Location,Salary,Experience,Password) VALUES ('$name','$role','$gender','$institution','$contact','$email','$subject','$location','$salary','$experience',$password)";

    	$result = mysqli_query($conn, $sql);
	}

    if ($result === true) {
        return true;
    } else {
        return false;
     }
    
    }
	function updateInfoS($name,$email,$institution,$class,$contact,$subject,$location,$salary){
		$conn = mysqli_connect("localhost","root","","tutormate");
		
		if(!$conn){
			die("connection failed" . mysqli_connect_error());
			}

		$sql ="UPDATE student SET 
            Full_Name = '$name',
            Institution = '$institution',
            Class = '$class',
            Contact_Number = '$contact',
            Subject = '$subject',
            Location = '$location',
            Salary = '$salary'
        WHERE Email = '$email'";

		$result = mysqli_query($conn,$sql);

	if($result === true)
	{
	return true;
	}

	else {
	return false;
		}
	}

function updateInfoT($name,$email,$institution,$experience,$contact,$subject,$location,$salary){
		$conn = mysqli_connect("localhost","root","","tutormate");
		
		if(!$conn){
			die("connection failed" . mysqli_connect_error());
			}

		$sql ="UPDATE tutor SET 
            Full_Name = '$name',
            Institution = '$institution',
            Experience = '$experience',
            Contact_Number = '$contact',
            Subject = '$subject',
            Location = '$location',
            Salary = '$salary'
        WHERE Email = '$email'";
		
		$result = mysqli_query($conn,$sql);

	if($result === true)
	{
	return true;
	}

	else {
	return false;
		}
	}

?>