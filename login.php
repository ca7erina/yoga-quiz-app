<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="/lab10/yoga-all.css">
	<script>
	validateUsername =function() {
	    var x = document.forms["login"]["username"].value;
	    if (x == null || x == "") {
		alert("Please input username");
		return false;
	    }
	}
	</script>
	<title>Login</title>
	</head>
	<body>
	<?php
	// Start the session. set questions and answers
	session_start();

	//cards array to hold 5 cards to question
	$cards = array(0, 0, 0,0,0);
	
	
	for ($i = 0; $i <5; $i++) {
		$cards[$i] = generate($cards);	//randomly chose 5 cards
	}

	

	function generate($cards){//chose 1 card from 20 card, dont allow repeatation
		$index =rand(1,20);
		while (alreadyHave($index,$cards)==true){
			$index =rand(1,20);
		}
		return $index;
	}

	
	
	function alreadyHave($index,$cards){
		for ($i = 0; $i <5; $i++) {
			if($index == $cards[$i]){
				return true;
			}
			
		}
		return false;
	}

	$_SESSION["q1_index"] = $cards[0];
	$_SESSION["q2_index"] = $cards[1];
	$_SESSION["q3_index"] = $cards[2];
	$_SESSION["q4_index"] = $cards[3];
	$_SESSION["q5_index"] = $cards[4];
	$_SESSION["currentIndex"] =1;

	//debug
	//echo " " .$_SESSION["q1_index"] ." " .$_SESSION["q2_index"] ." " .$_SESSION["q3_index"]. " " .$_SESSION["q4_index"]. " " .$_SESSION["q5_index"];
	
	setAns(1,$_SESSION["q1_index"]); //get pic info from mysql db and set the pic name into session
	setAns(2,$_SESSION["q2_index"]);
	setAns(3,$_SESSION["q3_index"]);
	setAns(4,$_SESSION["q4_index"]);
	setAns(5,$_SESSION["q5_index"]);
	//echo $_SESSION["q1_egnlishname"];
	//echo $_SESSION["q5_sanskritname"];

	
	function setAns($qid, $picname){
		//mysql
		$servername = "localhost";
		$username = "root";
		$password = "123456";
		$dbname = "lab10";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT picname, englishname, sanskritname FROM yogacards where picname = '" . $picname.  ".jpg'";
		if ($result = $conn->query($sql)) {
			$row = $result->fetch_assoc();
			$_SESSION["q".$qid."_englishname"] = $row["englishname"];
			$_SESSION["q".$qid."_sanskritname"] = $row["sanskritname"];
		}
		$conn->close();	
	}
	?>
	


	<div class= "container">
	    <div class = "upper">
	      <div id = "title"></div>
	      <div id = "banner"></div>
	    </div>
	    <div class = "middle">
	      <div id = "warning"></div>
	      <div id = "loginWindow">
		<form name="login" method="post" action = "quiz.php" onsubmit="return validateUsername()" >
		<table id = "loginTable">
		<?php
			if (isset($_SESSION["username"])) {
				$username = $_SESSION["username"];
			}
			if (!isset($username)){
				echo "<tr>";
				echo " <td>username</td>";
				echo "<td><input type='text' name='username' id='username' /></td>";
				echo "</tr>";
			
			}else{
				echo "Welcome " . $username. " !<br/>";
			}
		?>
		
		    <tr>
		    <td>language</td>
		    <td> <select name = "language">
			  <option value="english" selected="selected">English</option>
			  <option value="sanskrit">Sanskrit</option>
			</select> 
		   </td>
		  </tr>
		  <tr><td></td><td><input type="submit"  name = "enter " value="enter"></td>
		  </tr>
		  </table>
		</form>
	      </div>
	    </div>
	     <div class = "bottom">
	     </div>
	</div>
	</body>
</html>
