<?php

	if (isset($_GET["no"])) {
		$no = $_GET["no"];

	}
?>

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

	  		$query = "SELECT * FROM tableBoard where no = ".$no.";"; 

	  		if($result = $mysqli->query($query))
			{
				$row = $result->fetch_row();
				echo "<table>";
				echo "<tr><td>이름</td><td>".$row[3]."</td></tr>";
				echo "<tr><td>제목</td><td>".$row[1]."</td></tr>";
				echo "<tr><td>내용</td><td>".$row[2]."</td></tr>";
				echo "</table>";
			}
		
			echo "<button onclick=\"location.href='deleteAction.php?no=$no'\">글삭제</button>";
		?>

		
	</body>
</html>			

