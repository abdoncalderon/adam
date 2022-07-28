<template>
	<v-app>

		<!-- Main Menu -->
		
		<menu-component :menus="menus"></menu-component>	

		<!-- Title Bar -->

		<app-title-component :projectName="projectName"></app-title-component>

		<!-- Main -->

		<v-main style="background-color: #ECEFF1">
			
			<router-view></router-view>
		</v-main>
	</v-app>
</template>

<script>
import MenuComponent from '../components/MenuComponent.vue';
import AppTitleComponent from '../components/AppTitleComponent.vue';

export default {
  	components: { MenuComponent, AppTitleComponent },
	name: 'App',
	data: () => ({
		
		menus: [
			{ 
				code:'settings',
			 	title: 'Settings', 
				icon: 'mdi-circle-outline',
				route: '', 
				menus: [
							{ code:'settings.regions', title: 'Regions', icon: 'mdi-circle-outline', route: '/regions', menus:[] },
							{ code:'settings.countries', title: 'Countries', icon: 'mdi-circle-outline', route: '/countries',  menus:[] },
							{ code:'settings.companies', title: 'Companies', icon: 'mdi-circle-outline', route: '/companies',  menus:[] },
						],
			},
			{ 	code:'project', 
				title: 'Project', 
				icon: 'mdi-circle-outline', 
				route: '', 
				menus:[] ,
			},
			{ 	code:'production', 
				title: 'Production', 
				icon: 'mdi-circle-outline', 
				route: '', 
				menus:[],
			},
			
		],
		
		submenu: false,
		right: null,
		projectName: 'Consorcio Linea 1'
	}),
	/* computed: {
		showMenu () {
			return this.$store.state.showMenu
		}
	} */
	
};
</script>
