<!-- new users registration page -->
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<form action="validate_register.php" method="post">
		Name: &nbsp<input  type="text" name="name" required="" ><br><br>
		Roll_no: <input type="text" name="roll_no" required ><br><br>
		Ph_no:<input type="text" name="ph_no" required ><br><br>
		Branch:<input type="text" name="branch" required ><br><br>
		CGPA:<input type="number" step="any" name="cgpa" required=""><br><br>
		E_mail: <input type="email" name="emailid" required=""><br><br>
		Password:<input type="password" name="password" required=""><br><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>
