<template>
	<div>
		<router-link 
			to="/" 
			class="to-home">
			<i class="material-icons">home</i>
		</router-link>

		<router-view />
	</div>
</template>

<script>
export default {
	created () {
		console.log('Router:', this.$router)
		console.log('Route:', this.$route)
	}
}
</script>
<style lang="scss">
	// 버튼을 통해 이동할 페이지와 현재 위치한 페이지가 같을때에는 router-link-exact-active 태그가 붙는다. 이 기능을 이용하여 home에 위치해있을 때에는 홈버튼이 안보이도록 처리한다.
	.to-home.router-link-exact-active {
		display: none;
	}
</style>