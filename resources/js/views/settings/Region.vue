<template>
    <v-card class="ma-2" >

        <v-app-bar color="grey" dark height="30px">
            <span class="subtitle-2">Regions</span>
            <v-spacer></v-spacer>
            <router-link to="/"><v-icon class="subtitle-2">mdi-close</v-icon></router-link>
        </v-app-bar>
        
        <v-toolbar dense height="40px">

            <create-component :item="item" @newItem="storeItem"></create-component>

            <!-- List Items -->
            <v-btn icon small @click="showList=!showList"><v-icon>mdi-table</v-icon></v-btn>

        </v-toolbar>


            
        <list-component :show="showList" title="Country" :headers="headers" :items="items" :edit="true" :delete="true" sortField="name"></list-component>
        
    </v-card>
</template>
<script>

    import ListComponent from '../../components/ListComponent.vue'
    import CreateComponent from '../../components/CreateComponent.vue'


    export default {
        components: { ListComponent, CreateComponent },
        data: () => ({
            search: '',
            showList: true,
            showNew: false,
            headers: [
                { text: 'Name', value: 'name', align: 'start' },
                { text: 'Actions', value: 'actions', align: 'start', sortable: false },
            ],
            items: [],
            item: undefined
        }),

        methods: {

            async regionsList(){
                await this.axios.get('/api/region')
                    .then(response=>{
                        this.items = response.data
                    })
                    .catch(error=>{
                        this.items = []
                    })
            },
        },

        mounted() {
            this.regionsList()
        },
    }
</script>