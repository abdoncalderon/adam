<template>

    <v-list-item
        id="listItem"
        :to="menu.route"
        link
        exact
        dense
    >
        <v-list-item-icon>
            <v-icon small v-text="menu.icon"></v-icon>
        </v-list-item-icon>

        <v-list-item-content v-if="menu.text">
            <v-list-item-title>{{ $trnsl(menu.text) }}</v-list-item-title>
        </v-list-item-content>

    </v-list-item>

</template>

<script>
    export default {
        props: {
            menu: {
            type: Object,
            default: () => ({}),
            },
        },
      
    }
</script>


