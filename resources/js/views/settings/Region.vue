<template>
    <v-sheet class="ma-2 pa-2" >

        <v-app-bar color="grey" dark height="40px" flat>
            <span class="subtitle-2">{{ $content.region }}</span>
            <v-spacer></v-spacer>
            <v-icon medium @click="home" class="subtitle-2">mdi-close</v-icon>
        </v-app-bar>
        
        <!-- <v-app-bar height="50px" flat> -->

            <!-- New Item -->
            <!-- <v-btn icon fab @click="showFormClick"><v-icon>mdi-plus</v-icon></v-btn>
 -->
            <!-- List Items -->
            <!-- <v-btn icon fab @click="showListClick" ><v-icon>mdi-table</v-icon></v-btn> -->

            <!-- List Items -->
            <!-- <v-btn icon fab @click="showListClick" ><v-icon>mdi-content-save</v-icon></v-btn> -->

        <!-- </v-app-bar> -->

        <toolbar-component
            :icons="icons"
            @clickIcon="clickIcon"
        />

        <!-- <form-dialog-component
            :showForm="showForm"
            :item="region" 
            :dataset="dataset" 
            @newItem="store"
            @closed="closeForm"
        ></form-dialog-component> -->

        <form-component
            :showForm="showForm"
            :title="$content.region"
            :item="region" 
            :dataset="dataset" 
            @newItem="store"
            @closed="closeForm"
        />
            
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
        />
        
    </v-sheet>
</template>
<script>

    import ListComponent from '../../components/widgets/List/ListComponent.vue'
    // import FormDialogComponent from '../../components/widgets/Dialogs/FormDialogComponent.vue'
    import FormComponent from '../../components/widgets/Form/FormComponent.vue'
    import ToolbarComponent from '../../components/widgets/Toolbar/ToolbarComponent.vue'


    export default {

        components: { ListComponent, FormComponent, ToolbarComponent },

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
                {name: 'name', type: 'text', lenght: 255, text: 'Name', value: '', lg: 8, md: 6,},
                {name: 'country', type: 'select', text: 'Country', value: '', lg: 4, md: 6, items: [
                    {id: 1, name: 'Ecuador'},
                    {id: 2, name: 'España'},
                    {id: 3, name: 'Mexico'},
                ]},
                {name: 'gender', type: 'radio', text: 'Gender', value: '', lg: 12, md: 12, items: [
                    {id: 1, name: 'Masculino'},
                    {id: 2, name: 'Femenino'},
                    {id: 3, name: 'Masculino'},
                    {id: 4, name: 'Femenino'},
                ]},
                {name: 'edad', type: 'number', lenght: 2, text: 'Edad', value: '', lg: 4, md: 4, suffix: 'años'},
                {name: 'clave', type: 'password', lenght: 16, text: 'Password', value: '', lg: 8, md: 6, show: false},
                {name: 'fecha', type: 'date', text: 'Fecha', value: '', lg: 4, md: 6,},
                {name: 'casado', type: 'switch', text: 'Casado', value: '', lg: 3, md: 3,},
                {name: 'email', type: 'email', text: 'Email', value: '', lg: 5, md: 5, suffix: '@gmail.com'},
            ],
            region: {
                name:"",
            },
            sortField: 'name',
            icons: [
                {id: 'list', text: 'List', icon: 'mdi-table'},
                {id: 'new', text: 'New', icon: 'mdi-plus'},
                {id: 'save', text: 'Save', icon: 'mdi-content-save'},
                {id: 'cancel', text: 'Cancel', icon: 'mdi-cancel'}
            ]
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
            },
            
            
            home(){
                this.$router.push('/')
            },
            clickIcon(icon) {
                if (icon.id==='new') {
                    this.showForm = true
                    this.showList = false
                }
                if (icon.id==='list'){ 
                    this.showForm = false
                    this.showList = true
                }
                if (icon.id==='save') { }
                if (icon.id==='cancel') { }

            }
            
        },

        mounted() {
            this.list()
        },
    }
</script>