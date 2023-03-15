<template>
    <v-app-bar 
        app 
        flat 
        dark 
        absolute 
        color="blue" 
        height="50px"
    >
        <v-app-bar-nav-icon @click="clickMenu"></v-app-bar-nav-icon>
        <!-- <v-app-bar-title class="caption">{{ projectName }}</v-app-bar-title> -->
        <v-select
            class="ma-2"
            :items="projectsUser"
            item-text="name"
            item-value="id"
            dense
            solo
        >
        </v-select>
        <v-spacer></v-spacer>
        <v-menu
            color="primary"
            offset-y
            min-width="200px"
            class="pt-10"
            dark
        >
            <template
                v-slot:activator="{ on, attrs }"
            >
                <v-btn
                    plain
                    v-bind="attrs"
                    v-on="on"
                >
                    <v-avatar
                        size="24"
                        class="mr-2"
                    >
                        <img :src="photo" alt="">
                    </v-avatar>
                    {{ user.user }}
                </v-btn>
            </template>
            <v-card
                class="mx-auto text-center"
            >
                <v-avatar 
                    size="80"
                    class="ma-3"
                >
                    <img :src="photo">
                </v-avatar>
                <br>
                <span class="subtitle-2">{{ user.person.firstName + ' ' + user.person.lastName }}</span>
                <br>
                <span class="caption">{{ user.email }}</span>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn 
                        x-small
                        to="/profile"
                        link
                        exact
                    >
                        {{ $trnsl('content.profile') }}
                    </v-btn>
                    <v-spacer></v-spacer>
                    <form @submit.prevent="logout"> 
                        <v-btn 
                            x-small
                            type="submit"
                        >
                            {{ $trnsl('content.exit') }}
                        </v-btn>
                    </form>
                </v-card-actions>
            </v-card>
        </v-menu>
    </v-app-bar>
</template>
<script>
    export default {
        props: {
            projectName: String,
            user: Object,
            photo: String,
            drawer: Boolean,
            projectsUser: Array
        },
        methods: {
            clickMenu() {
                this.$emit('clickMenu', !this.drawer)
            },

            async logout() {
                await this.axios.post('logout')
                    .then(response=>{
                        console.log('logout')
                    })
                    .catch(error=>{
                        console.log(error)
                    })
            }
        },
    }
</script>