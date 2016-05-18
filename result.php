<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="/lab10/yoga-all.css">
	<title>Result</title>
	</head>
	<body>
	<?php
	session_start();
	$username = $_SESSION["username"] ;
	$quizlanguage =$_GET["quizlanguage"];

	//calculate correct answer
	$correct = 0 ;
	for ($i = 1; $i <= 5; $i++) {
			if (isset($_SESSION["q" . $i. "_userAns"]) && !empty($_SESSION["q" . $i. "_userAns"])){
					//echo " q_userAns " . $_SESSION["q" . $i. "_userAns"];
					//echo " q_englishname " . $_SESSION["q". $i."_" . $quizlanguage];
					if($_SESSION["q" . $i. "_userAns"] == $_SESSION["q". $i."_" . $quizlanguage]){ 
						//echo "correct";
						$correct=$correct+1;
					}
			}

		}
	$total =5;
	$wrong =$total-$correct;
	
	// remove all session variables
	session_unset();
	// destroy the session
	session_destroy();
	?>
	<div class= "container">
	    <div class = "upper">
	      <div id = "title"></div>
	      <div id = "banner"></div>
	    </div>
	    <div class = "middle">
	     <div id = "resultWindow">
       <table id= "resultTable" >
       	 <tr><td>username</td><td id = "username"><?php echo $username ?> </td></tr>
          <tr><td>correct</td><td id = "correct"><?php echo $correct ?> </td></tr>
           <tr><td>wrong</td><td id = "wrong"><?php echo $wrong ?></td></tr>
            <tr><td>total</td><td id = "total"><?php echo $total ?></td></tr>
       </table>
     	<form action="http://127.0.0.1:1234/lab10/login.php">
	    <input type="submit" value="Quiz me again"></input>
	</form>
        
       </div>
	     
	    </div>
	     <div class = "bottom">
	     </div>
	</div>
	</body>
</html>
