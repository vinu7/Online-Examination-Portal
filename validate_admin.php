
<?php
	session_start();
?>


<?php
	include_once "db_connection.php";
	//conn is connection with databse "ExaminationDB"
?>
<html>
<body>


<?php

	$email="";
	$pass="";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
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

	//echo $email;
	//echo $pass;
	//echo "<br>";

	$sql="SELECT * FROM admins WHERE emailid='$email' AND password='$pass'";
	$result = $conn->query($sql);
	if (!$result)
	{
    	trigger_error('Invalid query: ' . $conn->error);
	}
	//echo $result->num_rows;
	$row = $result->fetch_assoc();
	//echo $row['emailid']."and".$row['password'];
	if($result->num_rows ==1)
	{
		

		


	   	header("Location: Admin_page.php");
   		exit;

	}
	else
	{
		//echo "Incorrect Details!<br>";
		//echo "Click below to register or Login again";
		header("Location:Login_page.php?error=login");
		exit;

	}
	



?>
<