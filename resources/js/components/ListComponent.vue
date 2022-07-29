<template>
    <v-card v-if="showList">
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

                    <!-- Edit Dialog -->
                    <v-dialog
                        v-model="dialogEdit"
                        max-width="600px"
                    >
                        <form @submit.prevent="editConfirm">
                            <v-card>
                                <v-card-title>
                                    <span class="caption">{{ title }}</span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" v-for="field in dataset" :key="field.name">
                                                <v-text-field 
                                                    v-model="selectedItem[field.name]" 
                                                    :label="field.text" 
                                                    filled
                                                    clearable
                                                    dense
                                                >
                                                </v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="closeEdit"
                                        small
                                    >
                                        {{ $content.cancel }}
                                    </v-btn>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        type="submit"
                                        small
                                    >
                                        {{ $content.update }}
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </form>
                    </v-dialog>

                    <!-- Delete Dialog -->
                    <v-dialog 
                        v-model="dialogDelete" 
                        max-width="500px"
                    >
                        <v-card>
                            <v-card-title class="title">{{ $messages.confirmDelete+' '+selectedItem.name+'?' }} </v-card-title>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>

                    </v-dialog>

                    <v-spacer></v-spacer>
                    
                    <v-text-field dense v-model="search" append-icon="mdi-magnify" :label="$content.search" single-line hide-details></v-text-field>

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
            deleteAction: Boolean,
            editAction: Boolean,
            headers: Array,
            items: Array,
            dataset: Array,
            showList: Boolean,
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

            editConfirm() {
                this.$emit('editItem', this.selectedItem)
                this.closeEdit()
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