<template>
    <v-sheet class="ma-2 pa-2" >

        <v-app-bar color="grey" dark height="40px" flat>
            <span class="subtitle-2">{{ $trnsl('content.city') }}</span>
            <v-spacer></v-spacer>
            <v-icon medium @click="home">mdi-close</v-icon>
        </v-app-bar>

        <toolbar-component
            :icons="icons"
            @clickIcon="clickIcon"
        />

        <form-dialog-component
            :showForm="showForm"
            :title="$trnsl('content.city')"
            :subtitle="$trnsl('content.new')"
            :item="city" 
            :dataset="dataset" 
            @saveItem="store"
            @closed="closeForm"
        ></form-dialog-component>
            
        <list-component 
            :showList="showList" 
            :title="$trnsl('content.city')"
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
    import ToolbarComponent from '../../../components/widgets/Toolbar/ToolbarComponent.vue'
    import ListComponent from '../../../components/widgets/List/ListComponent.vue'
    import FormDialogComponent from '../../../components/widgets/Dialog/FormDialogComponent.vue'

    export default {

        components: { ListComponent, FormDialogComponent, ToolbarComponent },

        data: () => ({
            search: '',
            showList: true,
            showForm: false,
            sortField: 'name',
            
            dataset: [
                {name: 'name', type: 'text', text: 'content.name', lenght: 255, lg: 6, md: 6, sm: 12},
                {name: 'state_id', type: 'select', text: 'content.state', items: [], lg: 6, md: 6, sm: 12},
            ],
            items: [],
            headers: [],
            city: {
                name: "",
                state_id: 0
            },
            icons: [
                {id: 'new', text: 'content.new', icon: 'mdi-plus', color: 'success'},
            ]
        }),
       
        methods: {

            loadSelectItems(list, index) {
                this.dataset[index].items = list
            },

            async liststates(){
                var states = []
                await this.axios.get('/api/state')
                    .then(response=>{
                        states = response.data
                        this.loadSelectItems(states, 1)
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                
            },

            async list(){
                await this.axios.get('/api/city')
                    .then(response=>{
                        this.items = response.data
                    })
                    .catch(error=>{
                        console.log(error)
                    })
            },

            async store(){
                await this.axios.post('/api/city',this.city)
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
                await this.axios.put(`/api/city/${id}`,selectedItem)
                    .then(response=>{
                        this.list()
                    })
                    .catch(error=>{
                        console.log(error)
                    })
            },

            destroy(selectedItem){
                var id = selectedItem.id
                this.axios.delete(`/api/city/${id}`)
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
                }
            }
            
        },
        
        mounted() {
            this.list()
            this.liststates()
            this.headers = [
                { text: this.$trnsl('content.name'), value: 'name', align: 'start' },
                { text: this.$trnsl('content.state'), value: 'state.name', align: 'start' },
                { text: this.$trnsl('content.actions'), value: 'actions', align: 'start', sortable: false },
            ]
            
        },
        
    }

</script>