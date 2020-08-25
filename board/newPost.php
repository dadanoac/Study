<!DOCTYPE html>
<html>
	<head>
		<title>나으게시판</title>

		<link rel="stylesheet" type="text/css" href="style.css">

	</head>
	<body>
		<form action="">
			이름:
			<input type="text" name="name" value="" size="100"><br>
			제목:
			<input type="text" name="title" value="" size="100"><br>
			내용:
			<input type="text" name="contents" value="" size="100" height="300">

		</form>
	
		<button onclick='newPost()'>글쓰기</button>
		<script>
			function newPost(){
				<?php
			
					$mysqli = mysqli_connect("localhost","test","test","tableDB");
						if (mysqli_connect_errno())
						{
		  					echo "Failed to connect to MySQL". mysqli_connect_error();
		  				}

	  				$query = "INSERT INTO tableBoard (title, name, date) VALUE ('jull', '3rd Post', '2020-05-01 00:00:00');";
					
					mysqli_query($query);
	    		?>
			}
		</script>	


	</body>
</html>			

