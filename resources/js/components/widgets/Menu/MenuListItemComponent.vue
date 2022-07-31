<template>

    <v-list-item
        id="listItem"
        :to="menu.route"
        link
        exact
    >
        <v-list-item-icon>
            <v-icon dense v-text="menu.icon"></v-icon>
        </v-list-item-icon>

        <v-list-item-content v-if="menu.text">
            <v-list-item-title v-text="menu.text" />
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


