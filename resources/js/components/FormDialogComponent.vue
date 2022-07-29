<template>
    <v-dialog
        v-model="showForm"
        max-width="600px"
    >

        <form @submit.prevent="save">
            <v-card>
                <v-card-title>
                    <span class="caption">{{ title }}</span>
                </v-card-title>

                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12" v-for="field in dataset" :key="field.name">
                                <v-text-field 
                                    v-model="item[field.name]" 
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
                        @click="close"
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
                         {{ $content.save }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </form>

        
    </v-dialog>
</template>
<script>
    export default {
        props: {
            title: String,
            dataset: Array,
            item: Object,
            showForm: Boolean,
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