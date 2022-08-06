<template>

    <v-list-group
        color="white"
        active-class="dark text--white"
        no-action
        dense
    >

        <template v-slot:activator>

            <v-icon small class="pl-8 pr-3" v-text="menu.icon"></v-icon>

            <v-list-item-content v-if="menu.text">
                <v-list-item-title dense>{{ $trnsl(menu.text )}}</v-list-item-title> 
                
            </v-list-item-content> 
            
        </template>
        

        <template v-for="submenu2  in menu.menus">
            
            <menu-list-group-level2-component
                v-if="typeof(submenu2.route) === 'undefined' || submenu2.route === null"
                :key="submenu2.id"
                :menu="submenu2"
                
            />

            <menu-list-item-level2-component
                v-else
                :key="submenu2.id"
                :menu="submenu2"
            />

        </template>

    </v-list-group>

</template>

<script>
    import MenuListItemLevel2Component from './MenuListItemLevel2Component.vue'
    import MenuListGroupLevel2Component from './MenuListGroupLevel2Component.vue'

    export default {
        name: 'MenuListSubGroupComponent',
        components: { MenuListItemLevel2Component, MenuListGroupLevel2Component },
        props: {
            menu: {
                type: Object,
                default: () => ({}),
            },
        },
        created() {
            console.log(this.menu.menus)
        }
    }
</script>
