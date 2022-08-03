
<template>

    <v-list-group
        color="white"
        active-class="dark text--white"
    >

        <template v-slot:activator>

            <v-icon class="pr-3" v-text="menu.icon"></v-icon>

            <v-list-item-content v-if="menu.text">
                <v-list-item-title dense v-text="$trnsl(menu.text)" /> 
            </v-list-item-content> 
            
        </template>

        <template v-for="submenu in menu.menus">
            
            <menu-list-group-component
                v-if="typeof(submenu.route) === 'undefined' || submenu.route === null"
                :key="submenu.code"
                :menu="submenu"
                no-action
                sub-group
            />

            <menu-list-sub-item-component
                v-else
                :key="submenu.code"
                :menu="submenu"
            />

        </template>

    </v-list-group>

</template>

<script>
  import MenuListSubItemComponent from './MenuListSubItemComponent.vue'

  export default {
    name: 'MenuListGroupComponent',
    components: { MenuListSubItemComponent },
    props: {
      menu: {
        type: Object,
        default: () => ({}),
      },
    },
  }
</script>
