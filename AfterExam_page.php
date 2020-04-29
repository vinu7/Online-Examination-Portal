<!-- displays post examination details like score and correct answers etc.., -->
<?php
	session_start();
	echo "<h1 >Exam is completed</h1>";
	 //remove all session variables
	//session_unset(); 
	 //destroy the session 
	//session_destroy();
	
?>

<?php
	include_once "db_connection.php";
	//conn is connection with databse "ExaminationDB"
?>


<html>
<head>
	<title>
		
	</title>
</head>
<body style="background-color: lightgrey">

	<div style="border-style: groove; ">
	<?php
		echo "Total Marks you got in Exam: ".$_SESSION['correct_count']."/".$_SESSION['totalqns']."<br> <br>";
		echo "Total Number of Questions in Exam: ".$_SESSION['totalqns']."<br>";
		echo "Total Number of Questions attempted: ".$_SESSION['attempted_qns']."<br>";
		echo "Total Number of Questions Correctly answered: ".$_SESSION['correct_count']."<br>";
		echo "Total Number of Questions wrongly answered : ".$_SESSION['wrong_count']."<br>"."<br>";
	?></div>
	<?php
		if($_SESSION['wrong_count']>0)
			echo "<h3>Following are wronly attempted questions</h3>";
		foreach ($_SESSION['wrongqnids'] as $value)
		{
			?>
		<hr>
			<?php
		    //echo "wrong qn number is ".$value."<br>";
		    $sql = "SELECT * FROM questions WHERE qid='$value'";//$_SESSION['current_id']";
			$result = $conn->query($sql);
			if(!$result)
			{
				trigger_error('Invalid query: ' . $conn->error);		
			}
			//result is table with one question with id as current_id
			$row = $result->fetch_assoc();
			echo " <strong>Q" .$value."-". $row['question'] . "</strong><br />";
			$option =$row['answer'];
			//echo "hee ".$option."<br>";
			echo "correct answer is: ".$row[$option]."<br>";
		?>
		<hr>
<?php
		}


	?>

<br>
<br>
	<form action="Logout_page.php">
		<input type="submit" value="LOGOUT">
	</form>


</body>
</html>
