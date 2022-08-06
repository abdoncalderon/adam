<template>

    <v-list-group
        color="white"
        active-class="dark text--white"
        no-action
        dense
    >

        <template v-slot:activator>

            <v-icon small class="pl-16 pr-3" v-text="menu.icon"></v-icon>

            <v-list-item-content v-if="menu.text">
                <v-list-item-title dense>{{ $trnsl(menu.text )}}</v-list-item-title> 
            </v-list-item-content> 
            
        </template>

        {{ menu }}

        <template v-for="submenu2  in menu.menus">
            
            <menu-list-group-level2-component
                v-if="typeof(submenu2.route) === 'undefined' || submenu2.route === null"
                :key="submenu2.id"
                :menu="submenu2"
            />

            <menu-list-sub-item-component
                v-else
                :key="submenu2.id"
                :menu="submenu2"
            />

        </template>

    </v-list-group>

</template>

<script>
    import MenuListItemLevel3Component from './MenuListItemLevel3Component.vue'

    export default {
        name: 'MenuListSubGroupComponent',
        components: { MenuListItemLevel3Component },
        props: {
            menu: {
                type: Object,
                default: () => ({}),
            },
        },
    }
</script>