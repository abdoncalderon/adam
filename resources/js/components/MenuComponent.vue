<template>
    <v-navigation-drawer v-model="drawer" app dark width="300px">

        <menu-header-component :logo="logo" :user="user"/>

        <v-divider dense class="ma-0"></v-divider>  

        <menu-list-component :menus="menus"/>
        
    </v-navigation-drawer>
</template>

<script>
    import MenuListComponent from './widgets/Menu/MenuListComponent.vue'
    import MenuHeaderComponent from './widgets/Menu/MenuHeaderComponent.vue'
    export default {
        components: { MenuListComponent, MenuHeaderComponent},
        props: {
            menus: {
                type: Array,
                default: () => ({}),
            },
            user: {
                type: Object,
                default: () => ({}),
            },
            logo: String,
            drawer: Boolean
        },
    }
</script>
