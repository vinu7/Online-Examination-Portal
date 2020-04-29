<!-- calculates and updates session variables after each question is answered -->
<?php
    //strat the session
    session_start();
?>



<?php
    $_SESSION['answered']=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $radioVal = $_POST["option"];
        if(!$radioVal)
            echo "not set";
        else{
        if($radioVal == "option1")
        {
            //echo("option1");
            $_SESSION['answered']=true;
            $_SESSION['current_option']="option1";
        }
        else if ($radioVal == "option2")
        {
            //echo("option2");
            $_SESSION['answered']=true;
            $_SESSION['current_option']="option2";
        }
        else if($radioVal=="option3")
        {
            //echo "option3";
            $_SESSION['answered']=true;
            $_SESSION['current_option']="option3";
        }
        else if($radioVal=="option4")
        {
            //echo "option4";
            $_SESSION['answered']=true;
            $_SESSION['current_option']="option4";
        }
        else
            echo "No choice";
    }
}
?>




<?php 
    	if($_SESSION['answered']==true)
    	{
    		$_SESSION['attempted_qns']+=1;
            $temp1= $_SESSION['current_option']."<br>";
            $temp2= $_SESSION['correct_option']."<br>"; 
            //echo "hi ".$temp1."hee ".$temp2;
    		if($temp1==$temp2)//$_SESSION['current_option']==$_SESSION['correct_option'])
    		{
                //echo "what mann?<br>";
    			$_SESSION['correct_count']+=1;
    		}
    		else
    		{
                //echo "chii buddy";
                $temp1=$_SESSION['current_id']-1;
                array_push($_SESSION['wrongqnids'],$temp1);
    			$_SESSION['wrong_count']+=1;	
    		}
    	}
    
    if(($_SESSION['current_id']==($_SESSION['totalqns']+1)) || ($_POST["SUBMIT"]=="Submit") )
    {

   // <form action="AfterExam_page.php">
    //<input type="submit" value="submit">

    //</form>
        header("Location: AfterExam_page.php");
        exit;

?>
<?php
    }
    else
    {

        //<form action="Examination_page.php">
        //<input type="submit" value="Nextques">
?>
<?php
        header("Location: Examination_page.php");
        exit;
?>


<?php

    }
?>


