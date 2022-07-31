<template>
    <v-app-bar app flat dark absolute color="blue" height="40px">
        <v-app-bar-nav-icon @click="clickMenu"></v-app-bar-nav-icon>
        <v-app-bar-title class="caption">{{ projectName }}</v-app-bar-title>
        <v-spacer></v-spacer>
    </v-app-bar>
</template>
<script>
    export default {
        props: {
            projectName: String,
            drawer: Boolean
        },
        methods: {
            clickMenu() {
                this.$emit('clickMenu', !this.drawer)
            }
        },
    }
</script>