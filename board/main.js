// 1. 돔에 main.js를 연결하고 데이터를 묶는다.
// Vue 인스턴스를 만든다.
const app = new Vue({
	el: "#myApp",

	data: {
		jeff:{
			name: "mr.황",
			age:20
		},
		susan:{
			name: "susan",
			age:21
		},
		jill: "질레이너"

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
		<h2>이름: {{jeff.name}}</h2>
		<h2>나이: {{jeff.age}}</h2>
		<h2>친구1: {{jill}}</h2>
		<h2>친구2: 이름:{{susan.name}}, 나이:{{susan.age}}</h2>
		</div>
	`

});