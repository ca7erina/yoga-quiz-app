<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="/lab10/yoga-all.css">
	<script>

	</script>
	<title>Yoga Quiz</title>
	</head>
	<body>
	<?php
		$quizlanguage = "";
		
		session_start();
		$currentIndex = $_SESSION["currentIndex"] ;
		//save username in session
		if (isset($_POST["username"])){	
			$_SESSION["username"] = test_input($_POST["username"]);
			
		}

		if (isset($_POST["language"])){
			$_SESSION["language"] = test_input($_POST["language"]). "name";
			$quizlanguage = $_SESSION["language"] ;
		}

		function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
	?>
	<?php
		if (isset($_POST["next"])){
					
			//$currentIndex = $_SESSION["currentIndex"] ;

			$_SESSION["q". $currentIndex ."_userAns"] = $_POST["option"];
			if($currentIndex>=5){
				 
				 header("Location: /lab10/result.php?quizlanguage=" . $_SESSION["language"]);
					exit;
			}
			$_SESSION["currentIndex"] =$currentIndex+1;
		}
	?>
	<?php
		$quizlanguage = $_SESSION["language"];
		
		$options10 = array("", "", "","", "", "","", "", "",""); // contain all the english names
		
		$options10 = getOptions($options10,$quizlanguage);
		$options4 = array("", "", "", "");	
		for ($i = 0; $i <=2; $i++) {
			$options3[$i] = $options10[getGeneratedIndex($options10,$quizlanguage)];
		}
		$currentindex = $_SESSION["currentIndex"];
		$options3[3] = $_SESSION["q".$currentindex . "_" . $quizlanguage];
		echo $options3[3];
		shuffle ( $options3);

		
		function getGeneratedIndex($options10,$quizlanguage){
			$number =rand(0,9);
			while (alreadyHave($number,$options10,$quizlanguage)==true){
				$number =rand(0,9);
			}
			return $number;
		}
		function alreadyHave($number,$options10,$quizlanguage){
			for ($i =0; $i <=2; $i++) {
				if (isset($options3[$i]) && !empty($options3[$i])){
						if($options3[$i] ==$options10[$number]){// cannot chose the one already chosen
							return true;
						}
						
				}
			}
			
			$currentindex = $_SESSION["currentIndex"];
			
			//cannot chose the correct one
			if($options10[$number] == $_SESSION["q".$currentindex . "_" . $quizlanguage]){
				return true;
			}	
						
			
			return false;
		}
		function getOptions($options10,$quizlanguage){
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
			$sql = "SELECT ". $quizlanguage ." FROM yogacards;" ;
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$i =0;
					// output data of each row
					while($row = $result->fetch_assoc()) {
						//echo $row["englishname"];
						$options10[$i]=$row[$quizlanguage];
						$i =$i +1;
					}
				}
			$conn->close();	
			return $options10;
		}
	?>
	
	
	<div class= "container">
	    <div class = "upper">
	      <div id = "title"></div>
	      <div id = "banner"></div>
	    </div>
	    <div class = "middle">
		
		<?php 	
			echo "Welcome " . $_SESSION["username"]. " !<br/>";
			
			echo "Question " . $_SESSION["currentIndex"];
			
			$currentIndex = $_SESSION["currentIndex"] ;
			$picIndex = $_SESSION["q".$currentIndex ."_index" ] ;//q1_index
			echo 	"<div id = 'pic'><img src ='/lab10/pic/" . $picIndex . ".jpg'></img></div>";		
		?>
	    
	      <div id = "optionTable">
	      <form name="answer" method="post" >
		<table id = "quizTable" >
		  <tr>
		<?php 
		echo "<td><input type='radio' name='option'  checked='checked' value='". $options3[0] ."'> ". $options3[0] ."  </td>";
		echo "<td><input type='radio' name='option' value='". $options3[1] ."'> ". $options3[1] ."  </td>";
		?>
		</tr>
		  <tr>
		<?php 
		echo "<td><input type='radio' name='option' value='". $options3[2] ."'> ". $options3[2] ."  </td>";
		echo "<td><input type='radio' name='option' value='". $options3[3] ."'> ". $options3[3] ."  </td>";
		?>
		  </tr>
		</table>
		
	     <input id = "next" type="submit" name="next" value='next'/>

	    </form>
	    </div>
 		</div>
	     <div class = "bottom">
			<?php
				//debug
			for ($i = 0; $i <4; $i++) {
				echo $options3[$i] . " ";
			}
			

			?>	
		</div>
	</div>
	</body>
</html>
