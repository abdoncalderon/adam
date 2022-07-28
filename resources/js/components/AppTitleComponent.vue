<template>
    <v-app-bar app flat dark absolute color="blue" height="30px">
        <v-app-bar-nav-icon @click="change"></v-app-bar-nav-icon>
        <v-app-bar-title class="caption">{{ projectName }}</v-app-bar-title>
        <v-spacer></v-spacer>
        
    </v-app-bar>
</template>
<script>
    export default {
        props: {
            projectName: String,
        },
        /* methods: {
            change(){
                this.$store.commit('change')
            }
        } */
    }
</script>