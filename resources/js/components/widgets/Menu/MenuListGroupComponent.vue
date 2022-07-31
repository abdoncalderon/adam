<template>

    <v-list-group
        :color="gradient !== 1 ? 'white' : undefined"
        :prepend-icon="menu.icon"
        active-class="dark text--white"
        
    >
        <template v-slot:activator>
            <v-list-item-content v-if="menu.text">
                <v-list-item-title v-text="menu.text" />
            </v-list-item-content>
        </template>

        <template v-for="submenu in menu.menus">
            
            <menu-list-group-component
                v-if="submenu.router==''"
                :key="submenu.code"
                :menu="submenu"
            />

            <menu-list-item-component
                v-else
                :key="submenu.code"
                :menu="submenu"
            />

        </template>

    </v-list-group>

</template>

<script>
  import MenuListItemComponent from './MenuListItemComponent.vue'

  export default {
    components: { MenuListItemComponent },
    props: {
      menu: {
        type: Object,
        default: () => ({}),
      },
    },
  }
</script>
