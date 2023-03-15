<template>
	<v-app>
		
		<!-- Main Menu -->
		
		<menu-component :menus="menus" :drawer="drawer" :user="user" :photo="photo" :logo="logo" ></menu-component>	

		<!-- Title Bar -->

		<header-component :projectsUser="projectsUser" :user="user" :photo="photo" :drawer="drawer" @clickMenu="showMenu"/>

		<!-- Content -->

		{{ projectsUser }}
		
		<content-component/>

	</v-app>
</template>

<script>
import MenuComponent from '../../components/MenuComponent.vue';
import HeaderComponent from '../../components/HeaderComponent.vue';
import ContentComponent from '../../components/ContentComponent.vue';

export default {

  	components: { MenuComponent, HeaderComponent, ContentComponent },

	name: 'App',

	data: () => ({
		menus: [],
		drawer: false,
		projectName: 'Consorcio Linea 1',
		logo: require('../../../../storage/app/public/kapatax/logo.png'),
		projectsUser: [],
		projects: [],
		project: {},
		user: {},
		photo: ''
	}),

	methods: {

		showMenu(click) {
			this.drawer = click
		},

		async loadMenus(){
			await this.axios.get('/api/menu')
				.then(response=>{
					this.menus = response.data
				})
				.catch(error=>{
					this.menus = []
				})
		}, 

		async getProjectUser(){
			await this.axios.get('/api/getProjectUser')
				.then(response=>{
					this.projectsUser = response.data.projectsUser
					this.user = response.data.user
					this.photo = 'storage/people/photos/' + this.user.person.photo
				})
				.catch(error=>{
					console.log(error)
				})
		}, 
		
	},
	
	mounted() {
		this.getProjectUser()
		this.loadMenus()
	}
	
};
</script>
