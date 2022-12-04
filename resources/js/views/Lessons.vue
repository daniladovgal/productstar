<template>
	<div class="lessons container">
		<h1>Уроки</h1>
		<table>
			<tr>
				<td>Урок</td>
				<td>Просмотров</td>
			</tr>
			<tr v-if="lessons" v-for="lesson in lessons">
				<td>{{lesson.name}}</td>
				<td>{{lesson.complete}}</td>
			</tr>
		</table>
	</div>
</template>
<script>
	import axios from 'axios';
	export default {
		name: 'Lessons',
		mounted() {
			this.getLessons();
		},
		data: () => ({
			loading: true,
			lessons: false
		}),
		methods: {
			getLessons() {
				axios.get('/api/lessons')
				.then(res => { console.log(res);
					this.loading = false;
					this.lessons = res.data;
				})
			},
		}
	}
</script>