<?php  

//임포트
include("simplehtmldom_1_9_1/simple_html_dom.php");
ini_set('max_execution_time', 300);

////이미 크롤링한 링크 배열
$alreadyCrawled = array();

//크롤링 할 링크 배열
$toCrawl = array();



//링크를 만드는 function
function createLink($src, $url){
	$scheme = parse_url($url)["scheme"]; //http, https
	$host = parse_url($url)["host"]; //www.naver.com /about.php /search.php ...

	// 
	if (substr($src, 0, 2) == "//")
	{
		$src = $scheme . ":" . $src; //http://
	}
	else if (substr($src, 0, 1) == "/")
	{
		$src = $scheme . "://" . $host . $src; //http://www.naver.com/
	}
	else if (substr($src, 0, 2) == "./")
	{
		$src = $scheme . "://" . $host . dirname(parse_url($url)["path"]) . substr($src, 1);
	}
	else if (substr($src, 0, 3) == "../"){
		$src = $scheme . "://" . $host . "/" . $src;
	}
	else if (substr($src, 0, 5) != "https" && substr($src, 0, 4) != "http"){
		$src = $scheme . "://" . $host . "/" . $src;
	}

	return $src;
}

function folloLinks($url){

	// global 키워드로 전역으로 접근 가능하다.
	global $alreadyCrawled;
	global $toCrawl;

	// url의 html 돔을 가져온다
	$html = file_get_html($url);

	if($html && is_object($html) && isset($html->nodes)){

		// 링크를 배열에 담는다.
		$linkList = $html->find('a');

		// foreach 반복문 사용
		// 0,1,2,3,4,5....
		foreach ($linkList as $link) {
			# code...
			$href = $link->href;

			//필요없는 요소 제거
			if(strpos($href, "#") !== false)
			{
				continue;
			}
			else if(substr($href, 0, 11) == "javascript:")
			{
				continue;
			}

			$href = createLink($href, $url);

			//해당 링크가 크롤링 해야되는 링크라면
			if(!in_array($href, $alreadyCrawled)){
				$alreadyCrawled = $href;
				$toCrawl[] = $href;

				//링크에 대한 정보를 가져온다.
				getDetails($href);
			}
			//echo $href . '<br>';
			// 세부정보를 가져온다.
			
		}
		//해당 페이지의 링크들을 한번씩 다 크롤링 함.

		//배열의 맨 앞의 녀석을 반환하고 배열의 길이를 하나씩 줄인다.
		//배열이 비어있거나 배열이 아닌 경우 NULL을 반환한다.
		array_shift($toCrawl);

		foreach($toCrawl as $site){
			followLinks($site);
		}
	}

}

function folloImages($url){
	// url의 html 돔을 가져온다
	$html = file_get_html($url);

	// 링크를 배열에 담는다.
	$imageList = $html->find('img');

	// foreach 반복문 사용
	// 0,1,2,3,4,5....
	foreach ($imageList as $imageItem) {
		# code...
		$src = $imageItem->src;

		$src = createLink($src, $url);
		echo $src . '<br>';

		// 가져온 url를 이미지로 다운받아 웹서버의 폴더에 저장한다.
		$imageFile = file_get_contents($src);

		$pathinfo = pathinfo($src);

		// imageName.jpg
		$imageName = $pathinfo['filename'] . '.' . $pathinfo['extension'];

		file_put_contents("assets/fetchedImages/" . $imageName, $imageFile);
	}

}

// 해당 링크의 세부정보를 가져온다
function getDetails($url){

	$html = file_get_html($url);
	
	if($html && is_object($html) && isset($html->nodes)){
	
		// 변수 초기화
		$description = "";
		$keywords = "";

		$titleMeta = $html->find("title",0);
		$keywordsMeta = $html->find("meta[name=keywords]",0);
		$descriptionMeta = $html->find("meta[name=description]",0);

		$title = $titleMeta->plaintext;
		$title = str_replace("\n","", $title);

		$titleEmptyCheck = $title;

		$titleemptyCheck = str_replace(" ","", $titleEmptyCheck);

		if($titleEmptyCheck == ""){
			return;
		}

		if ($title == "Object moved"){
			return;
		}

		// null 체크
		if($titleMeta !== null){
			$title = $titleMeta-> plaintext;
		}

		if($keywordsMeta !== null){
			$keywords = $keywordsMeta->getAttribute('content');
		}

		if($descriptionMeta !== null){
			$description = $descriptionMeta->getAttribute('content');
		}

		echo "URL: ". $url . ", 타이틀: " . $title . ", 키워드: " . $keywords . ", 설명: ". $description . "<br>";
	}
}


$siteToCrawl = "http://www.ohmynews.com/";
folloLinks($siteToCrawl);

?>