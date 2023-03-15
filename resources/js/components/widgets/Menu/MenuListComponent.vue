<template>

    <v-list
        expand
        nav
        dense
    >

        <template v-for="menu in menus">
            
            <menu-list-group-level0-component
                v-if="(typeof(menu.route) === 'undefined' || menu.route === null) && menu.father === null"
                :key="menu.id"
                :menu="menu"
            />
            
            <menu-list-item-level0-component
                v-else-if="menu.father === null"
                :key="menu.id"
                :menu="menu"
            />
            
        </template>

    </v-list>

</template>

<script>
    import MenuListGroupLevel0Component from './MenuListGroupLevel0Component.vue'
    import MenuListItemLevel0Component from './MenuListItemLevel0Component.vue'
    export default {
        components: { MenuListGroupLevel0Component, MenuListItemLevel0Component  },
        props: {
            menus: {
                type: Array,
                default: () => ({}),
            },
        },
        
    }
</script>