<!-- new users can register and registered users and admin can login using credentials -->
<?php
	session_start();
	//echo "Exam is completed";
	 //remove all session variables
	session_unset(); 
	 //destroy the session 
	session_destroy();
	
?>




<html>
<head>
	
</head>

<body style="background-color: #7b93a3" >
	
	<h1 style="border-style: solid; border-width: 5px; background-color: lightgrey;">WELCOME TO CLOUD EXAMINATION PORTAL</h1>
	<br>
	<table >
		<tr>
			<td width="400">
				<h3>Had an account?login</h3>
				<form method="post" action="validate_login.php">
					Emailid: &nbsp <input type="email" name="emailid" value=""><br>
					Password: &nbsp <input type="password" name="password" value=""><br>
					<br>
					<input type="submit" value="submit"> 
				</form>
			</td>
			<td valign="top">
				<h3>New user? register now</h3>
				<form action="Register.php">
					<input type="submit" value="Register">
				</form>
			</td>
			<td align="right">
				<h3>Admin</h3>
				<form method="post" action="validate_admin.php">
					Emailid: &nbsp <input type="email" name="emailid" value=""><br>
					Password: &nbsp <input type="password" name="password" value=""><br>
					<br>
					<input type="submit" value="submit"> 
				</form>
			</td>

		</tr>
	</table>


<?php
	$err = filter_input(INPUT_GET, 'error');
	if ($err === "login") echo "<script>alert('Invalid login!');</script>";
	//header("Location:Login_page.php");
	else if($err==="alreadyRegistered") echo "<script>alert('Already Registered!');</script>"; 

	else if($err==="SuccessfullyRegistered") echo "<script>alert('Successfully Registered!');</script>"; 


?>


</body>
</html>

