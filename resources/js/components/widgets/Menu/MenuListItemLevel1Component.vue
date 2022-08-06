<template>

    <v-list-item
        class="pl-10"
        id="listItem"
        :to="menu.route"
        link
        exact
        dense
    >
        <v-icon small class="pr-3" v-text="menu.icon"></v-icon>

        <v-list-item-content>
            <v-list-item-title >{{ $trnsl(menu.text) }}</v-list-item-title>
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
