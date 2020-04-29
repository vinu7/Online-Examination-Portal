<!-- logout page and examination details are stored in database(history table) -->
<?php
	session_start();
	//echo "<h1 >Exam is completed</h1>";
	 //remove all session variables
	//session_unset(); 
	 //destroy the session 
	//session_destroy();	
?>
<?php
	include_once "db_connection.php";
	//conn is connection with databse "ExaminationDB"
?>

<?php
// set the expiration date to one hour ago
setcookie("roll_no", "", time() - 60);
?>

<html>
<body style="background-color: lightblue">

<p style="text-align: center;"><h2>Thanks for taking Exam</h2></p>


<?php
	$date = date('Y-m-d H:i:s');

	$name=$_SESSION['name'];
	$ph_no=$_SESSION['ph_no'];
	$Rollno=$_SESSION['roll_no'];
	$branch=$_SESSION['branch'];
	$email=$_SESSION['email'];
	//echo $email;
	$count=$_SESSION['correct_count'];

	$sql="INSERT INTO history VALUES ('$name','$Rollno','$ph_no','$branch','$email',$count ,'$date')";
 	$result = $conn->query($sql);
		if (!$result)
		{
    		trigger_error('Invalid query: ' . $conn->error);
		}
		


?>
	<?php
	//session_start();
	//echo "Exam is completed";
	 //remove all session variables
	session_unset(); 
	 //destroy the session 
	session_destroy();
	
	?>


<br>
	<form action="Login_page.php">
		<input type="submit" value="Home Page">
	</form>
</body>
</html>

