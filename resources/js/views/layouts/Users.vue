<template>
	<div class="users" v-if="!this.$route.params.id">
		<h1>Список пользователей</h1>
		<table v-if="users">
			<tr>
				<td>Имя</td>
				<td>Статус</td>
				<td>Почта</td>
			</tr>
			<tr v-if="users" v-for="user in users">
				<td><router-link :to="'/users/'+user.id">{{user.name}}</router-link></td>
				<td>{{user.role}}</td>
				<td>{{user.email}}</td>
			</tr>
		</table>
	</div>
	<div class="user" v-if="this.$route.params.id">
		<h1>Пользователь</h1>
		<table v-if="user_page">
			<tr>
				<td>Имя</td>
				<td>Статус</td>
				<td>Почта</td>
			</tr>
			<tr>
				<td>{{user_page.name}}</td>
				<td>{{user_page.role}}</td>
				<td>{{user_page.email}}</td>
			</tr>
			<tr>
				<td>Место в рейтинге: </td>
				<td></td>
			</tr>
			<tr>
				<td>Прогресс: </td>
				<td></td>
			</tr>
		</table>
	</div>
</template>
<script>
	import axios from 'axios';
	export default {
		name: 'Users',
		mounted() {
			if (!this.$route.params.id) {
				this.getUsers();
			} else {
				this.getUser(this.$route.params.id);
			}
		},
		data: () => ({
			loading: true,
			users: false,
			user_page: false
		}),
		watch: {
    		$route (to, from){
        		if (!this.$route.params.id) {
					this.getUsers();
				} else {
					this.getUser(this.$route.params.id);
				}
    		}
		},
		methods: {
			getUsers() {
				axios.get('/api/users/')
				.then(res => {
					this.user_page = false;
					this.loading = false;
					this.users = res.data;
				})
			},
			getUser(id) {
				axios.get('/api/users/'+id)
				.then(res => {
					this.users = false;
					this.loading = false;
					this.user_page = res.data[0];
					console.log(res.data[0]);
					console.log(this.user_page.id);
				})
			}
		}
	}
</script>