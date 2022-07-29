<template>
    <v-dialog
        v-model="dialogCreate"
        max-width="500px"
    >
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                icon
                color="success"
                v-bind="attrs"
                v-on="on"
                small
            >
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </template>

        <form @submit.prevent="save">
            <v-card>
                <v-card-title>
                    <span class="caption">{{ title }}</span>
                </v-card-title>

                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12" v-for="field in dataset" :key="field.name">
                                <v-text-field v-model="item[field.name]" :label="field.text" dense></v-text-field>
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
                    >
                        Cancel
                    </v-btn>
                    <v-btn
                        color="blue darken-1"
                        text
                        type="submit"
                    >
                        Save
                    </v-btn>
                </v-card-actions>
            </v-card>
        </form>

        
    </v-dialog>
</template>
<script>
    export default {
        data() {
            return {
                dialogCreate: false,
            }
        },
        props: {
            title: String,
            dataset: Array,
            item: Object,
        },
        methods: {
            save() {
                this.close()
                this.$emit('newItem', this.item)
            },
            close() {
                this.dialogCreate = false
            }
        }
    }
</script>