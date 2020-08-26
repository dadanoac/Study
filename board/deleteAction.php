<?php

	if (isset($_GET["no"])) {
		$no = $_GET["no"];
	}


	$mysqli = mysqli_connect("localhost","test","test","tableDB");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL". mysqli_connect_error();
	}

	$query = "delete from tableBoard where no = ".$no.";";
	
	$result = mysqli_query($mysqli, $query);
	if($result == true)
	{
?>
	<script>
		alert ("글이 삭제되었습니다.");
		location.replace("index.php");
	</script>
<?php
	}
	else
	{
		echo "fail";
	}
?>