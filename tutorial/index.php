<!DOCTYPE html>
<html>

	<head>
			
		<title>구글클론사이트</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<!-- jquery cdn 적용 -->
		<script
		  src="https://code.jquery.com/jquery-3.5.1.min.js"
		  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		  crossorigin="anonymous"></script>
	</head>

	<body>

		<!-- 웹페이지 화면을 감싸는 랩퍼 클래스, 인덱스페이지 -->
		<div class="wrapper indexPage">

			<!-- 메인섹션 -->
			<div class="mainSection">

				<div class="logoContainer">
					<img src="assets/img/logo.png" alt="">
				</div>

				<!-- 검색부분 -->
				<div class="searchContainer">
					<form action="search.php" method="GET">
						<div class="searchBox">

							<img src="assets/img/search.png" alt="">
							<input type="text" name="searchTerm" placeholder="검색어를 입력해주세요">

						</div>	
						<!-- 검색버튼 -->
						<input class="searchButton" type="submit" value="검색하기">

						</input>						

					</form>

				</div>

			</div>

		</div>
		<script type="text/javascript" src="assets/js/script.js"></script>
	</body>

</html>