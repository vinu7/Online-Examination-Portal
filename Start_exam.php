<!-- sets some php session variables and starts exam -->
<?php
session_start();
?>

<?php

//now
		$_SESSION['duration']=1;
		$_SESSION['start_time']=date("Y-m-d H:i:s");
		$end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));
		$_SESSION['end_time']=$end_time;
	//now
		header("Location: Examination_page.php");
   		exit;


?>