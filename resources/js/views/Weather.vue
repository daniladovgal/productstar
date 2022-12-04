<template>
	<div class="weather">
		<h1>Температура воздуха в Мурманске: {{temperature}}</h1>
	</div>
</template>
<script>
	import axios from 'axios';
	export default {
		name: 'Weather',
		mounted() {
			this.getWeather();
		},
		data: () => ({
			loading: true,
			temperature: 'Загрузка...'
		}),
		methods: {
			getWeather() {
				axios.get('/api/weather')
				.then(res => {
					this.loading = false;
					this.temperature = res.data.temperature;
				})
			}
		}
	}
</script>