<template>
    <v-sheet class="ma-2 pa-2" >

        <notification-error-element
			:error="error"
		/>

        <v-app-bar color="grey" dark height="40px" flat>
            <span class="subtitle-2">{{ $trnsl('content.region') }}</span>
            <v-spacer></v-spacer>
            <v-icon medium @click="home">mdi-close</v-icon>
        </v-app-bar>
                

        <toolbar-component
            :icons="icons"
            @clickIcon="clickIcon"
        />

        <!-- <form-component
            :showForm="showForm"
            :title="$trnsl('content.region')"
            :subtitle="$trnsl('content.new')"
            :item="region" 
            :dataset="dataset" 
            @newItem="store"
            @closed="closeForm"
        /> -->

        <form-dialog-component
            :showForm="showForm"
            :title="$trnsl('content.region')"
            :subtitle="$trnsl('content.new')"
            :item="region" 
            :dataset="dataset" 
            @saveItem="store"
            @closed="closeForm"
        ></form-dialog-component>

        

        <list-component 
            :showList="showList" 
            :title="$trnsl('content.region')"
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

    import ListComponent from '../../../components/widgets/List/ListComponent.vue'
    import FormDialogComponent from '../../../components/widgets/Dialog/FormDialogComponent.vue'
    import ToolbarComponent from '../../../components/widgets/Toolbar/ToolbarComponent.vue'
    import NotificationErrorElement from '../../../components/widgets/Notification/NotificationErrorComponent.vue'
     /* import FormComponent from '../../components/widgets/Form/FormComponent.vue' */

    export default {

        components: { ListComponent, FormDialogComponent, ToolbarComponent, NotificationErrorElement },

        data: () => ({
            search: '',
            showList: true,
            showForm: false,
            headers: [],
            items: [],
            sortField: 'name',
            error: null,
            region: {
                name:"",
            },
            dataset: [
                {name: 'name', type: 'text', lenght: 255, text: 'content.name', value: '', lg: 8, md: 6, sm: 12},
            ],
            icons: [
                
                {id: 'new', text: 'content.new', icon: 'mdi-plus', color: 'success'},
                {id: 'import', text: 'content.import', icon: 'mdi-database-import', color: 'default'},
                // {id: 'list', text: '', icon: 'mdi-table', color: 'primary'},
               /*  {id: 'save', text: 'Save', icon: 'mdi-content-save'},
                {id: 'cancel', text: 'Cancel', icon: 'mdi-cancel'} */
            ]
        }),

        methods: {

            async list(){
                await this.axios.get('/api/region')
                    .then(response=>{
                        this.items = response.data
                    })
                    .catch(error=>{
                        this.error = error
                        
                    })
            },

            async store(){
                await this.axios.post('/api/region',this.region)
                    .then(response=>{
                        this.list()
                    })
                    .catch(error=>{
                        this.error = error
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
                        this.error = error
                    })
            },

            destroy(selectedItem){
                var id = selectedItem.id
                this.axios.delete(`/api/region/${id}`)
                .then(response=>{
                    this.list()
                }).catch(error=>{
                    this.error = error
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
                    // this.showList = false
                }
                if (icon.id==='list'){ 
                    this.showList = true
                }
                if (icon.id==='import') {
                    this.showForm = true
                 }
                if (icon.id==='save') { }
                if (icon.id==='cancel') { }

            }
            
        },

        mounted() {
            this.list()
            this.headers = [
                { text: this.$trnsl('content.name'), value: 'name', align: 'start' },
                { text: this.$trnsl('content.actions'), value: 'actions', align: 'start', sortable: false },
            ]

        },
    }
</script>