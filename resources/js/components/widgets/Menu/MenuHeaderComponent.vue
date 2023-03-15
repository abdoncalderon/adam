<template>

    <v-card>
        
        <v-app-bar flat>
            <v-img
                contain
                height="60px"
                :src="logo"
                @click="home"
            ></v-img>
        </v-app-bar>

        <v-list           
        >
            <v-list-item>
                <v-list-item-avatar
                    size="45px"
                >
                    <v-img :src="photo"></v-img>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title class="subtitle-2">{{ user.user }}</v-list-item-title>                    
                    <v-list-item-subtitle class="caption">{{ user.email }}</v-list-item-subtitle>
                </v-list-item-content>

            </v-list-item>
           

            <!-- <v-list-item link>

                <v-list-item-content>
                    <v-list-item-title class="text-h6">
                    John Leider
                    </v-list-item-title>
                    <v-list-item-subtitle>john@vuetifyjs.com</v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-action>
                    <v-icon>mdi-menu-down</v-icon>
                </v-list-item-action>

            </v-list-item> -->
        </v-list>
    </v-card>
</template>
<script>
    export default ({
        
        props: {
            logo: String,
            user: Object,
            photo: String,
        },
        methods: {
            home() {
                this.$router.push('/')
            },
            
        },
        
    })
</script>
