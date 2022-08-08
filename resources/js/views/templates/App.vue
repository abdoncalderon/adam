<template>
	<v-app>

		<!-- Main Menu -->
		
		<menu-component :menus="menus" :drawer="drawer" :user="user" :logo="logo"></menu-component>	

		<!-- Title Bar -->

		<header-component :projectName="projectName" :drawer="drawer" @clickMenu="showMenu"/>

		<!-- Content -->
		
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
		logo: require('../../../../storage/app/public/settings/logo/kapatax.png'),
		user: {
			name: 'abdonc',
			avatar: require('../../../../storage/app/public/people/photos/abdonc.jpg'),
			email: 'abdonc@gmail.com'
		},
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
		
	},
	
	mounted() {
		this.loadMenus()
	}
	
	
};
</script>
