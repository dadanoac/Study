// 1. 돔에 main.js를 연결하고 데이터를 묶는다.
// Vue 인스턴스를 만든다.
const app = new Vue({
	el: "#myApp",

	data: {
		people: [

			{
				name: "mr.황",
				nickName: "코드마스터",
				age:20
			},
			{
				name: "susan",
				nickName: "코드좁밥",
				age:21
			},
			
			{ 
				name: "질레이너",
				nickName: "망나니",
				age:35
			}
		]	
	},

	//요소에 접근이 가능하다.
	computed:{
/*		printJeffName()	{
			return `${this.jeff.nickName} ${this.jeff.name}`
		},

		printSusanName(){
			return `${this.susan.nickName} ${this.susan.name}`
		},

		printJillName()	{
			return `${this.jill.nickName} ${this.jill.name}`
		},	

		jeffInOneYear(){
			return this.jeff.age + 1;
		}*/

	},

	filters:{
		//이름을 필터링 -> input 사용이 가능한 computed인듯.
		printName(inputValue) {
			return `${inputValue.nickName} ${inputValue.name}`
		},

		inOneYear(inputValue) {
			return inputValue.age + 1;

		}
	},

	//함수를 정의
	methods: {
		//나이가 증가한다.
		addAge(person){
			person.age = person.age + 1;	
		},

		minusAge(person){
			person.age = person.age - 1;
		}
		
	},

	beforeCreate(){
		console.log("beforeCreate() called");
	},

	created(){
		console.log("creaed() called");
	},

	beforeMount(){
		console.log("beforeMount() called");
	},

	mounted(){
		console.log("mounted() called");
	},

	beforeUpdate(){
		console.log("beforeUpdate() called");
	},

	update(){
		console.log("update() called");
	},

	beforeDestroy(){
		console.log("beforeDestory() called");
	},	

	destroy(){
		console.log("destory() called");
	},	

	template: `
		<div>

			<h2 v-for="person in people">
				<h4>
					{{person | printName}}
				</h4>

				<h5>
					{{person.age}}
				</h5>
				<input type="text" v-model="person.name"/>
				<input type="text" v-model="person.nickName"/>
				<br>
					<button v-on:click='addAge(person)'>+</button>
					<button v-on:click='minusAge(person)'>-</button>
				<br>
			</h2>
		</div>
	`

});