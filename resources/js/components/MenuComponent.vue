<template>
    <v-navigation-drawer v-model="drawer" app dark >
        <v-list-item class="subtitle-2" dense>Kapatax</v-list-item>   
        <v-divider dense class="ma-0"></v-divider>  

        <v-list-group v-for="menu in menus" :key="menu.code" dense :value="false">

                <template v-if="menu.route===''" v-slot:activator>
                    <v-icon dense>{{ menu.icon }}</v-icon>
                    <v-list-item dense class="caption">{{ menu.title }}</v-list-item>
                </template>

                <v-list-item v-if="menu.route!=''" link to={{ menu.route }}>
                    <v-list-item-content>
                        <v-list-item dense class="caption">{{ menu.title }}</v-list-item>
                    </v-list-item-content>
                </v-list-item>
                
                <v-list-item  v-for="submenu in menu.menus" :key="submenu.code" :to="submenu.route" dense link>
                    <v-icon dense class="pl-4">{{ submenu.icon }}</v-icon>
                    <v-list-item dense class="caption">{{ submenu.title }}</v-list-item>
                </v-list-item>

        </v-list-group>
    </v-navigation-drawer>
</template>

<script>
    export default {
        props: {
            menus: [],
            drawer: Boolean
        },
    }
</script>
