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

        <v-card>
            <v-card-title>
            <span class="caption">{{ title }}</span>
            </v-card-title>

            <v-card-text>
                <v-container>
                    <v-row>
                        <v-col cols="12">
                            <v-text-field v-model="editedItem.name" label="Region Name" dense></v-text-field>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                    color="blue darken-1"
                    text
                    @click="closeCreate"
                >
                    Cancel
                </v-btn>
                <v-btn
                    color="blue darken-1"
                    text
                    @click="save"
                >
                    Save
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        props: {
            item: undefined
        }
        methods: {

        }
    }
</script>