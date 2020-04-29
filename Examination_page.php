<!-- This page displays questions one by one and keeps track of correct and incorrectly answered questions -->
<?php
	include_once "db_connection.php";
	//conn is connection with databse "ExaminationDB"
?>

<?php
	//strat the session
	session_start();
?>

<html>
	<body >


<table style="color: black; background-color: lightgreen ;border-style: double; ">
		<tr>
			<td height="80" width="400">
				<h2>Online Examination</h2>
			</td>
			<td height =80 width=850 valign="top">
				<div style="text-align: right;" class="t1">Total Time : <?php echo $_SESSION['duration']." mins" ?></br> Time Ends in <div id="respo"></div></div>
			</td>
		</tr>
</table>

<br>


				
	

<!--<p ><h2 style=" padding: 10px; text-align: left; color: grey; border-style: groove;">Examination Page
<div style="text-align: right;" class="t1">Total Time : <?php echo $_SESSION['duration']." mins" ?></br> Time Ends in <div id="respo"></div></div>
</h2></p>-->

<?php
if(!isset($_SESSION['current_id'])) 
{
	$sql="SELECT * FROM questions ORDER BY qid";
	$result = $conn->query($sql);
	//echo $result->num_rows ."<br>";
	$_SESSION['current_id']=1;
	$_SESSION['totalqns']=$result->num_rows;
	$_SESSION['attempted_qns']=0;
	$_SESSION['correct_count']=0;
	$_SESSION['wrong_count']=0;
	$_SESSION['answered']=false;
	$_SESSION['current_option']="option1";
	$_SESSION['correct_option']="option1";
	$_SESSION['wrongqnids']=array();
	
	
	$temp=$_SESSION['current_id'];
	//echo $temp."<br>";
	$sql = "SELECT * FROM questions WHERE qid='$temp'";//$_SESSION['current_id']";
	$result = $conn->query($sql);
	if(!$result)
	{
		trigger_error('Invalid query: ' . $conn->error);		
	}
	//result is table with one question with id as current_id
	$row = $result->fetch_assoc();
?>
<div style="border-style: groove;background-color: lightgrey; ">
	<form method="post" action="calculate.php">
		<?php echo " <strong>" .$_SESSION['current_id']."-". $row['question'] . "</strong><br />"; ?>
		A: <input type="radio" id="r1" onclick="myfun(1)" name="option"  value="option1"> <?php echo $row["option1"]; ?><br>
    	B: <input type="radio" id="r2" name="option" value="option2"> <?php echo $row["option2"]; ?><br>
    	C: <input type="radio" id="r3" name="option" value="option3"> <?php echo $row["option3"]; ?><br>
    	D: <input type="radio" id="r4" name="option" value="option4"> <?php echo $row["option4"]; ?><br>

    	
    	<?php
    		$_SESSION['correct_option']=$row['answer'];
    		//echo $row['answer']."<br>";
    		//echo $_SESSION['correct_option']."<br>";
    		$_SESSION['current_id']=$_SESSION['current_id']+1;
    	?>

    <input type="submit" value="Next Question">
    <input name="SUBMIT" type="submit" value="Submit">


	</form>
		
</div>
	<!--<form method="post" action="AfterExam_page.php">
		<input type="submit" value="Submit">
	</form>-->
    
	
<?php
}
else
{
	//echo "have session variables";
	// remove all session variables
	//session_unset(); 
	// destroy the session 
	//session_destroy();
	$_SESSION['answered']=false;
	$temp=$_SESSION['current_id'];
	//echo $temp."<br>";
	$sql = "SELECT * FROM questions WHERE qid=$temp";//$_SESSION['current_id']";
	$result = $conn->query($sql);
	if(!$result)
	{
		trigger_error('Invalid query: ' . $conn->error);		
	}
	//result is table with one question with id as current_id
	$row = $result->fetch_assoc();
?>
	<div style="border-style: groove; background-color: lightgrey;">

	<form method="post" action="calculate.php">
		<?php echo " <strong>" .$_SESSION['current_id']."-". $row['question'] . "</strong><br />"; ?>
		A: <input type="radio" name="option" value="option1"> <?php echo $row["option1"]; ?><br>
    	B: <input type="radio" name="option" value="option2"> <?php echo $row["option2"]; ?><br>
    	C: <input type="radio" name="option" value="option3"> <?php echo $row["option3"]; ?><br>
    	D: <input type="radio" name="option" value="option4"> <?php echo $row["option4"]; ?><br>

    	<br>

   	<?php 
   		$_SESSION['correct_option']=$row['answer'];
   		$_SESSION['current_id']=$_SESSION['current_id']+1;
   	
    
    if($_SESSION['current_id']==($_SESSION['totalqns']+1))
    {
   ?>
    <!--<input type="submit" value="Submit"> -->
   <?php
	}
	else
	{
		?>
		<input type="submit" value="Next Question">
		<?php
	}
?>

<input name="SUBMIT" type="submit" value="Submit">
	</form>


</div>
<!--<form method="post" action="calculate.php">
		<input name="SUBMIT" type="submit" value="Submit">
	</form>-->

<?php



}

?>





<br>
<p id="showtime"></p>




<script >
	function myfun( x)
	{
		if(x==1)
		if(document.getElementById("r1").checked==true)
			document.getElementById("r1").checked=false;
		else
			document.getElementById("r1").checked=true;
	}
	return;
</script>






<!--<div class="t1">Total Time : <?php echo $_SESSION['duration']." mins" ?></br> Time Ends in <div id="respo"></div></div>-->
<script type="text/javascript">
	
	var x=setInterval(function(){
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","response.php",false);
		xmlhttp.send(null);
		var str=document.getElementById("respo").innerHTML=xmlhttp.responseText;
		if(str.slice(6,8) == "00" && str.slice(3,5)=="00"){
			alert("TIME UP");
			window.location.href='AfterExam_page.php';
		}
	},1000);

</script>





	</body>
</html>
