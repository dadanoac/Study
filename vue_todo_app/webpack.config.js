const VueLoaderPlugin = require('vue-loader/lib/plugin')
const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const CopyPlugin = require('copy-webpack-plugin')
const { CleanWebpackPlugin } = require('clean-webpack-plugin')
const { merge } = require('webpack-merge')

module.exports = (env, opts) => {
	const config = {
		// 중복되는 옵션들
		resolve: {
			extensions: ['.vue', '.js'],
			alias: {
				'~': path.join(__dirname),
				'scss':path.join(__dirname, './scss')
			}
		},
		// 진입점
		entry: {
			app: path.join(__dirname, 'main.js')
		},
		// 결과물에 대한 설정
		output: {
			filename: '[name].js',	//app.js
			path: path.join(__dirname, 'dist')
		},
		module: {
			rules: [
			// ... other rules
				{
					test: /\.vue$/,
					use: 'vue-loader'
				},
				// this will apply to both plain `.js` files
				// AND `<script>` blocks in `.vue` files
				{
					test: /\.js$/,
					exclude: /node_modules/,
					use: 'babel-loader'
				},
				// this will apply to both plain `.css` files
				// AND `<style>` blocks in `.vue` files
				{
					test: /\.css$/,
					use: [
					'vue-style-loader',
					'css-loader',
					'postcss-loader'
					]
				},
				{
					test: /\.scss$/,
					use: [
						'vue-style-loader',
						'css-loader',
						'postcss-loader',
						'sass-loader'
					]
				}
			]
		},
		plugins: [
			//vue loader
			new VueLoaderPlugin(),
			//build시 기본적으로 생성된 root 폴더의 index.html에 build하여 dist 폴더에 위치
			new HtmlWebpackPlugin({
				template: path.join(__dirname, 'index.html')
			}),
			//build시 favicon assets폴더에 포함된 모든 파일들을 dist폴더로 복사
			new CopyPlugin({
				patterns:[
			
					{
						from: 'assets/',
						to: ''
					}
				]
			})
		]
	}

	//개발용
	if (opts.mode === 'development') {
		return merge(config, {
			//추가 개발용 옵션
			//'eval'은 개발용에 특화 디버팅가능/build시간 빠름. 'cheap-module-source-map'은 배포용, 디버깅 불가/build 느림
			devtool: 'eval',
			devServer: {
				open: false,
				hot: true
			}
		})
	}
	//제품용
	else {
		return merge(config, {
			//추가 배포용 옵션
			devtool: 'cheap-module-source-map',
			plugins: [
				// build시 이전의 파일들을 clear한 후, build
				new CleanWebpackPlugin()
			]
		})
	}
}