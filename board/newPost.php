<!DOCTYPE html>
<html>
	<head>
		<title>나으게시판</title>

		<link rel="stylesheet" type="text/css" href="style.css">

	</head>
	<body>
		<form action="writeAction.php" method="GET">
			이름:
			<input type="text" name="name" value="" size="100"><br>
			제목:
			<input type="text" name="title" value="" size="100"><br>
			내용:
			<input type="text" name="content" value="" size="100" height="300">

			<input class="searchButton" type="submit" value="글쓰기">

		</form>
	</body>
</html>			

