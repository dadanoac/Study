// 인터넷 DOM
// Document Object Model
$(document).ready(function(){
	const searchBox = $(".searchContainer .searchBox")
	const searchBoxInput = $(".searchContainer .searchBox input")

	// 검색입력부분이 포커스를 얻었을때
	searchBoxInput.focus(function(event) {
		/*act on event*/
		console.log("검색입력 부분이 포커스를 얻었다..")
		searchBox.addClass('searchBoxOnFocused');
	});

	// 검색입력부분이 포커스를 잃었을때
	searchBoxInput.blur(function(event) {
		/*act on event*/
		console.log("검색입력 부분이 포커스를 얻었다..")
		searchBox.removeClass('searchBoxOnFocused');
	});

	// search.php 로직
	// 그라데이션이 적용될 부분
	const searchBarContainer = $(".searchContainer .searchBarContainer");

	const searchBarBoxInput = $(".searchContainer input");

	searchBarBoxInput.focus(function(event){

		console.log(" 검색바입력 부분이 포커스를 얻었다..");
		searchBarContainer.addClass('searchBoxOnFocused');
	});

	searchBarBoxInput.blur(function(event){

		console.log(" 검색바입력 부분이 포커스를 잃었다..");
		searchBarContainer.removeClass('searchBoxOnFocused');
	});

});

function printHelloWorld(){
	console.log("hello world!!!");
}

