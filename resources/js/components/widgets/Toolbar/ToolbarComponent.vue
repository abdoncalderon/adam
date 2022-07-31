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

