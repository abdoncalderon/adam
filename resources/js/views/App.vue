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
import MenuComponent from '../components/MenuComponent.vue';
import HeaderComponent from '../components/HeaderComponent.vue';
import ContentComponent from '../components/ContentComponent.vue';

export default {
  	components: { MenuComponent, HeaderComponent, ContentComponent },
	name: 'App',
	data: () => ({
		
		menus: [
			{ 
				code:'settings',
			 	text: 'Settings', 
				icon: 'mdi-database',
				route: '', 
				menus: [
							{ code:'settings.regions', text: 'Regions', icon: 'mdi-circle-outline', route: '/regions', menus:[] },
							{ code:'settings.countries', text: 'Countries', icon: 'mdi-circle-outline', route: '/countries',  menus:[] },
							{ code:'settings.companies', text: 'Companies', icon: 'mdi-circle-outline', route: '/companies',  menus:[] },
						],
			},
			{ 	code:'project', 
				text: 'Project', 
				icon: 'mdi-tune', 
				route: '/', 
				menus:[] ,
			},
			{ 	code:'production', 
				text: 'Production', 
				icon: 'mdi-account-hard-hat', 
				route: '/', 
				menus:[],
			},
			
		],
		drawer: false,
		submenu: false,
		right: null,
		projectName: 'Consorcio Linea 1',
		logo: require('../../../storage/app/public/settings/logo/kapatax.png'),
		user: {
			name: 'abdonc',
			avatar: require('../../../storage/app/public/people/photos/abdonc.jpg'),
			email: 'abdonc@gmail.com'
		}
		

	}),
	methods: {
		showMenu(click) {
			this.drawer = click
		}
	}
	
	
};
</script>
