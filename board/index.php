<!DOCTYPE html>
<html>

	<head>
			
		<title>나으게시판</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		
	</head>
		
	<body>

		<?php 
			$index = 0;

			$mysqli = mysqli_connect("localhost","test","test","tableDB");
			if (mysqli_connect_errno())
			{
	  			echo "Failed to connect to MySQL". mysqli_connect_error();
	  		}

	  		$query = "SELECT * FROM tableBoard"; 

			//$data = mysql_query($query) ; 

			//$row = mysql_num_rows($result); 

		?>

		<table>
		<?php
			echo "<tr><td>"."index"."</td><td>"."title"."</td><td>"."name"."</td><td>"."date"."</td></tr>";
			if($result = $mysqli->query($query))
			{
				while($row = $result->fetch_row()){
					echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
				}
			}
			
	    ?>
		</table>
  	   	
		<button onclick="location.href='newPost.php'">글쓰기</button>
		<button>글삭제</button>
	</body>
</html>