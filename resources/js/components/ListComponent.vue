<template>
    <v-card v-if="show">
        <v-data-table
            :headers="headers"
            :items="items"
            :search="search"
            :sort-by="sortField"
            class="elevation-1"
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



                    <!-- Delete Dialog -->
                    <v-dialog 
                        v-model="dialogDelete" 
                        max-width="500px"
                    >
                        <v-card>
                            <v-card-title class="title">Are you sure you want to delete this item?</v-card-title>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>

                    </v-dialog>

                    <v-spacer></v-spacer>
                    
                    <v-text-field dense v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>

                </v-toolbar>
            </template>

            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    @click="editItem(item)"
                >
                    mdi-pencil
                </v-icon>
                <v-icon
                    small
                    @click="deleteItem(item)"
                >
                    mdi-delete
                </v-icon>
            </template>

            <!-- <template v-slot:no-data>
                <v-btn
                    color="primary"
                    @click="initialize"
                >
                    Reset
                </v-btn>
            </template> -->

        </v-data-table>

    </v-card>
</template>
<script>
    export default {
        data() {
            return {
                search: '',
                dialogEdit: false,
                dialogDelete: false,
                selectedIndex: -1,
                selectedItem: [],
                defaultItem: [],
            }
        },
        props: {
            delete: Boolean,
            edit: Boolean,
            headers: Array,
            items: Array,
            
            show: Boolean,
            sortField: String,
            title: String,
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

            deleteItemConfirm () {
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
        }
    }
</script>