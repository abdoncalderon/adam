<template>
    <v-card v-if="showForm">
        <form @submit.prevent="save">
            <v-card>
                <v-card-title>
                    <span class="caption">{{ title }}</span>
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col v-for="field in dataset" :key="field.name" :cols="field.cols">

                            <v-text-field 
                                v-if="field.type=='text'"
                                v-model="item[field.name]" 
                                :label="field.text" 
                                outlined
                                clearable
                            ></v-text-field>

                            <v-select
                                v-if="field.type=='select'"
                                :items="field.items"
                                :label="field.text"
                                outlined
                                @input="emitChange"
                            ></v-select>
                            
                            <div outlined dense v-if="field.type=='radio'">
                                <v-radio-group
                                    v-model="item[field.name]"
                                    row
                                >
                                    <v-radio v-for="item in field.items" :key="item.id"
                                        :label="item.name"
                                        :value="item.id"
                                    ></v-radio>
                                </v-radio-group>
                            </div>

                            <v-card outlined v-if="field.type=='switch'">
                                <span>{{ field.text }}</span>
                                <v-switch
                                    v-model="item[field.name]"
                                ></v-switch>
                            </v-card>
                            
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-card-actions>
                    
                    <v-btn
                        color="blue darken-1"
                        @click="close"
                        x-small
                        dark

                    >
                        {{ $content.cancel }}
                    </v-btn>
                    <v-btn
                        color="blue darken-1"
                        type="submit"
                        x-small
                        dark
                    >
                        {{ $content.save }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </form>
    </v-card>
</template>
<script>
    export default {
        props: {
            title: String,
            dataset: Array,
            item: Object,
            showForm: Boolean
        },
        methods: {
            save() {
                this.$emit('newItem', this.item)
            },
            close() {
                this.$emit('closed', !this.showForm)
            }
        }
    }
</script>