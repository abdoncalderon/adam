<template>
    <v-card class="ma-2" >

        <v-app-bar color="grey" dark height="30px">
            <span class="subtitle-2">{{ $content.region }}</span>
            <v-spacer></v-spacer>
            <router-link to="/"><v-icon class="subtitle-2">mdi-close</v-icon></router-link>
        </v-app-bar>
        
        <v-toolbar dense height="40px">

            <!-- New Item -->
            <v-btn icon small @click="showForm=!showForm" ><v-icon>mdi-plus</v-icon></v-btn>

            <!-- List Items -->
            <v-btn icon small @click="showList=!showList" ><v-icon>mdi-table</v-icon></v-btn>

        </v-toolbar>

        <!-- <form-dialog-component
            :showForm="showForm"
            :item="region" 
            :dataset="dataset" 
            @newItem="store"
            @closed="closeForm"
        ></form-dialog-component> -->

        <form-component
            :showForm="showForm"
            :item="region" 
            :dataset="dataset" 
            @newItem="store"
            @closed="closeForm"
        ></form-component>
            
        <list-component 
            :showList="showList" 
            :title="$content.region"
            :headers="headers" 
            :dataset="dataset"
            :items="items"
            :editAction="true" 
            :deleteAction="true" 
            :sortField="sortField"
            @editItem="update"
            @deleteItem="destroy"
        ></list-component>
        
    </v-card>
</template>
<script>

    import ListComponent from '../../components/ListComponent.vue'
    import FormDialogComponent from '../../components/FormDialogComponent.vue'
    import FormComponent from '../../components/FormComponent.vue'

    export default {

        components: { ListComponent, FormDialogComponent, FormComponent },

        data: () => ({
            search: '',
            showList: true,
            showForm: false,
            headers: [
                { text: 'Name', value: 'name', align: 'start' },
                { text: 'Actions', value: 'actions', align: 'start', sortable: false },
            ],
            items: [],
            dataset: [
                {name: 'name', type: 'text', lenght: 255, text: 'Name', value: '',},
                {name: 'gender', type: 'radio', text: 'Gender', value: '',items: [
                    {id: 1, name: 'Masculino'},
                    {id: 2, name: 'Femenino'},
                ]},
                {name: 'country', type: 'select', text: 'Country', value: '', items: [
                    {id: 1, name: 'Ecuador'},
                    {id: 2, name: 'España'},
                    {id: 3, name: 'Mexico'},
                ]},
            ],
            region: {
                name:"",
            },
            sortField: 'name',

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
                this.showForm = false
            },

            async update(selectedItem){
                var id = selectedItem.id
                await this.axios.put(`/api/region/${id}`,selectedItem)
                .then(response=>{
                    this.list()
                })
                .catch(error=>{
                    console.log(error)
                })
            },

            destroy(selectedItem){
                var id = selectedItem.id
                this.axios.delete(`/api/region/${id}`)
                .then(response=>{
                    this.list()
                }).catch(error=>{
                    console.log(error)
                })
            },

            closeForm() {
                this.showForm = false
            }
            
        },

        mounted() {
            this.list()
        },
    }
</script>