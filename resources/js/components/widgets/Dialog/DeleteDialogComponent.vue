<template>
    <v-dialog 
        v-model="showDelete" 
        max-width="500px"
    >
        <v-card>
            <v-card-title>{{ title }}</v-card-title>
            <v-card-subtitle>{{ subtitle }}</v-card-subtitle>

            <v-card-text>{{ $trnsl('messages.confirmDelete')+' '+item.name+'?' }}</v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">{{ $trnsl('content.cancel') }}</v-btn>
                <v-btn color="blue darken-1" text @click="confirm">{{ $trnsl('content.delete') }}</v-btn>
            </v-card-actions>
        </v-card>

    </v-dialog>
</template>
<script>
    export default {
        props: {
            title: String,
            subtitle: String,
            showDelete: Boolean,
            item: Object
        },
        methods: {
            confirm() {
                this.$emit('deleteItem', this.item)
            },
            close() {
                this.$emit('closed', !this.showDelete)
            },
        }

    }
</script>