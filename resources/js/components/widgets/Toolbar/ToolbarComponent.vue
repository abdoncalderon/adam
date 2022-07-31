<template>
    <v-app-bar dense height="55px" flat outlined>

        
        <v-btn
            v-for="icon in icons"
            :key="icon.id"
            icon
            fab
            @click="click(icon)"
        >
            <v-icon
               
            >
                {{ icon.icon }}
            </v-icon>

        </v-btn>


            <!-- New Item -->
            <!-- <v-btn icon small @click="showFormClick" ><v-icon>mdi-plus</v-icon></v-btn> -->

            <!-- List Items -->
            <!-- <v-btn icon small @click="showListClick" ><v-icon>mdi-table</v-icon></v-btn> -->

    </v-app-bar>
</template>
<script>
    export default {
        props: {
            icons: Array
        },
        methods: {
            click(icon) {
                this.$emit('clickIcon',icon)
            }
        }
    }
</script>

