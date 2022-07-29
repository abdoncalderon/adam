<template>
    <v-card class="ma-2" >

        <v-app-bar color="grey" dark height="30px">
            <span class="subtitle-2">Regions</span>
            <v-spacer></v-spacer>
            <router-link to="/"><v-icon class="subtitle-2">mdi-close</v-icon></router-link>
        </v-app-bar>
        
        <v-toolbar dense height="40px">

            <!-- New Item -->
            <form-component :item="region" :dataset="dataset" @newItem="store"></form-component>

            <!-- List Items -->
            <v-btn icon small @click="showList=!showList" ><v-icon>mdi-table</v-icon></v-btn>

        </v-toolbar>
            
        <list-component 
            :show="showList" 
            title="Country" 
            :headers="headers" 
            :items="items"
            :edit="true" 
            :delete="true" 
            sortField="name"
            @deleteItem="destroy"
        ></list-component>
        
    </v-card>
</template>
<script>

    import ListComponent from '../../components/ListComponent.vue'
    import FormComponent from '../../components/FormComponent.vue'

    export default {
        components: { ListComponent, FormComponent },
        data: () => ({
            search: '',
            showList: true,
            showNew: false,
            headers: [
                { text: 'Name', value: 'name', align: 'start' },
                { text: 'Actions', value: 'actions', align: 'start', sortable: false },
            ],
            items: [],
            dataset: [
                {name: 'name', type: 'text', lenght: 255, text: 'Name', value: ''},
            ],
            region: {
                name:"",
            }
                
        }),

        methods: {

            async list(){
                await this.axios.get('/api/region')
                    .then(response=>{
                        this.items = response.data
                    })
                    .catch(error=>{
                        this.items = []
                    })
            },

            async store(){
                await this.axios.post('/api/region',this.region)
                .then(response=>{
                    this.list()
                })
                .catch(error=>{
                    console.log(error)
                })
            },

            destroy(selectedItem){
                var id = selectedItem.id
                this.axios.delete(`/api/region/${id}`).then(response=>{
                    this.list()
                }).catch(error=>{
                    console.log(error)
                })
            }
            
        },

        mounted() {
            this.list()
        },
    }
</script>