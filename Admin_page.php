<?php
session_start();
?>


<?php
	include_once "db_connection.php";
	//conn is connection with databse "ExaminationDB"
?>


<html>
<head>
	
</head>

<body style="background-color: lightgrey" >
	
	<h1 style="border-style: solid; border-width: 5px; background-color: lightgrey;">Admin page</h1>



	<?php
		    //echo "wrong qn number is ".$value."<br>";
		    $sql = "SELECT * FROM history";//$_SESSION['current_id']";
			$result = $conn->query($sql);
			if(!$result)
			{
				trigger_error('Invalid query: ' . $conn->error);		
			}
			$responses = $result->num_rows;
			//$row = $result->fetch_assoc();

			while ($row = mysqli_fetch_array($result)) {
    //output a row here
    		echo ($row[0])." of ".($row[3])." got ".($row[5])." Marks at time ".($row[6])."<br>";
			}

			echo "<br>"

?>

	<form action="Login_page.php">
		<input type="submit" name="logout" value="Logout">
	</form>
</body>
</html>