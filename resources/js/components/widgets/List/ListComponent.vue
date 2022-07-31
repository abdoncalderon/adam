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
                    <v-dialog
                        v-model="dialogEdit"
                        max-width="800px"
                    >
                        <form @submit.prevent="editConfirm">
                            <v-card>
                                <v-card-title>
                                    <span>{{ title }}</span>
                                </v-card-title>

                                <v-card-text>

                                    <v-container>

                                        <v-row>

                                            <v-col 
                                                v-for="field in dataset" 
                                                :key="field.name"
                                                :lg="field.lg" 
                                                :md="field.md"
                                                :sm="field.sm"

                                                flat
                                            >

                                                <v-text-field 
                                                    v-if="field.type=='text'"
                                                    v-model="selectedItem[field.name]" 
                                                    type="text"
                                                    :label="field.text" 
                                                    :counter="field.lenght"
                                                    filled
                                                    clearable
                                                    dense
                                                >
                                                </v-text-field>

                                                <v-text-field
                                                    v-if="field.type=='number'"
                                                    v-model="selectedItem[field.name]" 
                                                    type="number"
                                                    :label="field.text" 
                                                    :prefix="field.prefix"
                                                    :suffix="field.suffix"
                                                    filled
                                                    clearable
                                                    dense
                                                ></v-text-field>

                                                <v-text-field
                                                    v-if="field.type=='password'"
                                                    v-model="selectedItem[field.name]" 
                                                    :append-icon="field.show ? 'mdi-eye' : 'mdi-eye-off'"
                                                    :type="field.show ? 'text' : 'password'"
                                                    :label="field.text" 
                                                    :counter="field.lenght"
                                                    filled
                                                    clearable
                                                    dense
                                                    @click:append="field.show = !field.show"
                                                ></v-text-field>

                                                <v-text-field
                                                    v-if="field.type=='date'"
                                                    v-model="selectedItem[field.name]" 
                                                    type="date"
                                                    :label="field.text" 
                                                    filled
                                                    clearable
                                                    dense
                                                ></v-text-field>

                                                <v-text-field
                                                    v-if="field.type=='email'"
                                                    
                                                    v-model="selectedItem[field.name]" 
                                                    type="email"
                                                    :label="field.text" 
                                                    :prefix="field.prefix"
                                                    :suffix="field.suffix"
                                                    filled
                                                    clearable
                                                    dense
                                                ></v-text-field>

                                                <v-select
                                                    v-if="field.type=='select'"
                                                    :items="field.items"
                                                    :label="field.text"
                                                    item-text="name"
                                                    item-value="id"
                                                    filled
                                                    clearable
                                                    dense
                                                    @input="emitChange"
                                                ></v-select>
                        
                                                <v-card 
                                                    v-if="field.type=='radio'"
                                                    class="mb-2"
                                                    color="#F4F4F4" 
                                                    height="55" 
                                                    outlined
                                                    flat
                                                >   
                                                    <v-row dense>
                                                        <v-col cols=3>
                                                            <p 
                                                                class="body-1" 
                                                                style="color: gray; padding: 15px 0px 0px 10px"
                                                            >{{ field.text }}</p>
                                                        </v-col>
                                                        <v-col cols="9" align-self="end">
                                                            <v-radio-group
                                                                v-model="selectedItem[field.name]"
                                                                row
                                                            >   
                                                                <v-radio 
                                                                    v-for="item in field.items" 
                                                                    :key="item.id"
                                                                    :label="item.name"
                                                                    :value="item.id"
                                                                    color="grey"
                                                                ></v-radio>
                                                            </v-radio-group>
                                                        </v-col>
                                                    </v-row>

                                                </v-card>

                                                <v-card 
                                                    v-if="field.type=='switch'"
                                                    color="#F4F4F4" 
                                                    height="55" 
                                                    outlined
                                                    flat
                                                    
                                                >
                                                    <v-row dense>
                                                        <v-col cols="8">
                                                            <p
                                                                class="body-1" 
                                                                style="color: gray; padding: 15px 0px 0px 10px"
                                                            >{{ field.text }}</p>
                                                        </v-col>
                                                        <v-col cols="4" align-self="center">
                                                            <v-switch
                                                                v-model="selectedItem[field.name]"
                                                            ></v-switch>
                                                        </v-col>
                                                    </v-row>
                                                </v-card>

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
            emitChange(){

            }
            
        }
    }
</script>