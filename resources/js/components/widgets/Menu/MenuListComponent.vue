<template>

    <v-list
        expand
        nav
        dense
    >

        <template v-for="menu in menus">

            <menu-list-group-component
                v-if="menu.route===''"
                :key="menu.code"
                :menu="menu"
            />
            
            <menu-list-item-component
                v-else
                :key="menu.code"
                :menu="menu"
            />

        </template>

    </v-list>

</template>

<script>
    import MenuListGroupComponent from './MenuListGroupComponent.vue'
    import MenuListItemComponent from './MenuListItemComponent.vue'
    export default {
        components: { MenuListGroupComponent, MenuListItemComponent  },
        props: {
            menus: {
                type: Array,
                default: () => ({}),
            },
        },
    }
</script>