<?php

	if (isset($_GET["name"])) {
		$name = $_GET["name"];

	}

	if (isset($_GET["title"])) {
		$title = $_GET["title"];

	}

	if (isset($_GET["content"])) {
		$content = $_GET["content"];

	}


	$mysqli = mysqli_connect("localhost","test","test","tableDB");
	if (mysqli_connect_errno())
	{
			echo "Failed to connect to MySQL". mysqli_connect_error();
		}

	date_default_timezone_set('Asia/Seoul');
	$query = "INSERT INTO tableBoard (title,content, name, date) VALUE ('".$title."', '".$content."','".$name."', '".date("Y-m-d h:i:s",time())."');";
	
	$result = mysqli_query($mysqli, $query);
	if($result == true)
	{
?>
	<script>
		alert ("글이 등록되었습니다.");
		location.replace("index.php");
	</script>
<?php
	}
	else
	{
		echo "fail";
	}
?>