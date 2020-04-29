<!-- includes instructions regarding exam -->
<?php
session_start();
?>

<?php
$cookie_name = "roll_no";
$cookie_value = $_SESSION['roll_no'];
setcookie($cookie_name, $cookie_value, time() + (60), "/"); // 86400 = 1 day
?>


<html>
<head>
	<title></title>
</head>
<body style="background-color: lightblue">
	<h2 style="text-align: center; ">Instructions for exam</h2>
	<ul>
		<li>There are <strong>six</strong> questions in exam.</li>
		<li>Once you go to next question you cant see previous questions.</li>
		<li>This is limited time exam.</li>
		<li>Time limit is 1 minute.</li>
		<li>Once time is over u can't answer any questions</li>
	</ul>
	
<form action="Start_exam.php">
	<input type="submit" name="Submit" value="Start Exam">
</form>

</body>
</html>