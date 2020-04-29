<!-- used for calculating remaining time of exam (which is displayed in examination page) -->
<?php
	session_start();
	$from_time1=date('Y-m-d H:i:s');
	$to_time1=$_SESSION['end_time'];
	$timeFirst=strtotime($from_time1);
	$timesecond=strtotime($to_time1);
	$diff=$timesecond - $timeFirst;

	echo gmdate("H:i:s",$diff);
	?>