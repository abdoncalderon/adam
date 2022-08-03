<template>
    <v-card v-if="showList" outlined flat>

        <v-data-table
            :headers="headers"
            :items="items"
            :search="search"
            :sort-by="sortField"
            dense
        >
            <template v-slot:top>
                <v-toolbar
                    flat
                >
                    <v-toolbar-title dense>{{ title }}</v-toolbar-title>

                    <v-divider
                        class="mx-4"
                        inset
                        vertical
                    ></v-divider>

                    <!-- Edit Dialog -->
                    <form-dialog-component
                        :showForm="dialogEdit"
                        :title="title"
                        :subtitle="subtitle"
                        :item="selectedItem" 
                        :dataset="dataset" 
                        @saveItem="editConfirm"
                        @closed="closeEdit"
                    ></form-dialog-component>

                    <!-- Delete Dialog -->
                    <delete-dialog-component
                        :showDelete="dialogDelete"
                        :item="selectedItem" 
                        :title="title"
                        :subtitle="subtitle"
                        @deleteItem="deleteConfirm"
                        @closed="closeDelete"
                    />

                    <v-spacer></v-spacer>
                    
                    <v-text-field dense v-model="search" append-icon="mdi-magnify" :label="$trnsl('content.search')" single-line hide-details></v-text-field>

                </v-toolbar>
            </template>

            <template v-slot:item.actions="{ item }">
                <v-icon
                    v-if="editAction"
                    small
                    class="mr-2"
                    @click="editItem(item)"
                >
                    mdi-pencil
                </v-icon>
                <v-icon
                    v-if="deleteAction"
                    small
                    @click="deleteItem(item)"
                >
                    mdi-delete
                </v-icon>
            </template>

        </v-data-table>

    </v-card>

</template>

<script>

    import FormDialogComponent from '../../../components/widgets/Dialog/FormDialogComponent.vue'
    import DeleteDialogComponent from '../../../components/widgets/Dialog/DeleteDialogComponent.vue'

    export default {
        components: { FormDialogComponent, DeleteDialogComponent },
        data() {
            return {
                search: '',
                dialogEdit: false,
                dialogDelete: false,
                selectedIndex: -1,
                selectedItem: {},
                defaultItem: {},
            }
        },
        props: {
            deleteAction: Boolean,
            editAction: Boolean,
            headers: Array,
            items: Array,
            dataset: Array,
            showList: Boolean,
            sortField: String,
            title: String,
            subtitle: String,
        },
        watch: {
            dialogDelete (val) {
                val || this.closeDelete()
            },
        },

        methods: {
            editItem (item) {
                this.selectIndex = this.items.indexOf(item)
                this.selectedItem = Object.assign({}, item)
                this.dialogEdit = true
            },

            deleteItem (item) {
                this.selectedIndex = this.items.indexOf(item)
                this.selectedItem = Object.assign({}, item)
                this.dialogDelete = true
            },

            editConfirm() {
                this.$emit('editItem', this.selectedItem)
                this.closeEdit()
            },

            deleteConfirm () {
                this.items.splice(this.selectedIndex, 1)
                this.$emit('deleteItem',this.selectedItem)
                this.closeDelete()
            },

            closeDelete () {
                this.dialogDelete = false
                this.$nextTick(() => {
                    this.selectedItem = Object.assign({}, this.defaultItem)
                    this.selectedIndex = -1
                })
            },
            closeEdit () {
                this.dialogEdit = false
                this.$nextTick(() => {
                    this.selectedItem = Object.assign({}, this.defaultItem)
                    this.selectedIndex = -1
                })
            },
            
            
        }
    }
</script>