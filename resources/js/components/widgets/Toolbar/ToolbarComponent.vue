<template>

    <v-app-bar dense height="55px" flat outlined>

        <template v-for="icon in icons">
            <v-btn 
                v-if="icon.text"
                class="mr-2 text-capitalize"
                :key="icon.id"
                :color="icon.color"
                small
                @click="click(icon)"
            >
                <v-icon left>
                    {{ icon.icon }}
                </v-icon>
                {{ $trnsl(icon.text) }}
            </v-btn>
            <v-btn 
                v-else
                :key="icon.id"
                :color="icon.color"
                icon
                fab
                small
                @click="click(icon)"
            >
                <v-icon>
                    {{ icon.icon }}
                </v-icon>
            </v-btn>
        </template>
        
           

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

