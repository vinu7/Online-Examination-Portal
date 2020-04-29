<?php
	include_once "db_connection.php";
	//conn is connection with databse "ExaminationDB"
?>

<html>
<body>


<?php

	$name=$email=$ph_no=$branch=$pass="";
	$nameErr=0;
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$name=test_input($_POST["name"]);

		/*if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      		$nameErr = 1;//"Only letters and white space allowed"; 
    	}*/
    	if(!preg_match("/^[a-zA-Z'-]+$/",$name)) { die ("invalid first name");} 

		$roll_no=test_input($_POST["roll_no"]);
		$ph_no=test_input($_POST["ph_no"]);
		$branch=test_input($_POST["branch"]);
		$cgpa=test_input($_POST["cgpa"]);
		$email=test_input($_POST["emailid"]);
		$pass=test_input($_POST["password"]);
	}

	function test_input($data)
	{
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

/*if($nameErr)
{
	echo "<script>alert('Only letters and white space allowed')
	window.location.href='Register.php';</script>";
	//		window.location.href='AfterExam_page.php';
	//header("Location: Register.php");	

}
else
{

*/
	$sql="SELECT * FROM userDetails WHERE name='$name' AND roll_no='$roll_no' AND ph_no='$ph_no' AND branch='$branch' AND CGPA='$cgpa' AND emailid='$email' AND password='$pass' ";
	$result = $conn->query($sql);
	if (!$result)
	{
    	trigger_error('Invalid query: ' . $conn->error);
	}
	if($result->num_rows != 0)
	{
		//already registered
		header("Location:Login_page.php?error=alreadyRegistered");
		exit;
	}
	else
	{
		//new uaer
		$sql="INSERT INTO userDetails VALUES ('$name','$roll_no','$ph_no','$branch','$cgpa','$email','$pass')";
		$result=$conn->query($sql);
		if(!$result)
		{
			trigger_error('Invalid query: ' . $conn->error);		
		}

		$sql="INSERT INTO users VALUES ('$email','$pass')";
		$result=$conn->query($sql);
		if(!$result)
		{
			trigger_error('Invalid query: ' . $conn->error);		
		}


		header("Location:Login_page.php?error=SuccessfullyRegistered");
		exit;


	}
//}
