
<template>

    <v-list-group
        color="white"
        active-class="dark text--white"
        no-action
        dense
    >

        <template v-slot:activator>

            <v-icon class="pr-3" v-text="menu.icon"></v-icon>

            <v-list-item-content v-if="menu.text">
                <v-list-item-title dense v-text="$trnsl(menu.text)" /> 
            </v-list-item-content> 
            
        </template>

        <template v-for="submenu1  in menu.menus">
            
            <menu-list-group-level1-component
                v-if="typeof(submenu1.route) === 'undefined' || submenu1.route === null"
                :key="submenu1.id"
                :menu="submenu1"
            />

            <menu-list-item-level1-component
                v-else
                :key="submenu1.id"
                :menu="submenu1"
            />

        </template>

    </v-list-group>

</template>

<script>
    import MenuListItemLevel1Component from './MenuListItemLevel1Component.vue'
    import MenuListGroupLevel1Component from './MenuListGroupLevel1Component.vue'

    export default {
        name: 'MenuListGroupComponent',
        components: { MenuListItemLevel1Component, MenuListGroupLevel1Component },
        props: {
            menu: {
                type: Object,
                default: () => ({}),
            },
        },
        
    }
</script>
