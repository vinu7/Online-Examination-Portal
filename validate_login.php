<!--validates users login details -->
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

	$sql="SELECT * FROM users WHERE emailid='$email' AND password='$pass'";
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
		//save user information as session variables
		$_SESSION['emailid']=$email;

		$sql="SELECT * FROM userDetails WHERE emailid='$email' AND password='$pass'";
		$result = $conn->query($sql);
		if (!$result)
		{
    		trigger_error('Invalid query: ' . $conn->error);
		}
		$row = $result->fetch_assoc();

		$name=$row['name'];
		$Rollno=$row['roll_no'];
		$ph_no=$row['ph_no'];
		$branch=$row['branch'];
		$email=$row['emailid'];


		$_SESSION['name']=$name;
		$_SESSION['ph_no']=$ph_no;
		$_SESSION['roll_no']=$Rollno;
		$_SESSION['branch']=$branch;
		$_SESSION['email']=$email;


?>
		<?php

	   	header("Location: Instruction_page.php");
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