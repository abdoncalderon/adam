<template>
    <v-card v-if="showForm" outlined flat >

        <form-header-component
            :title="title"
            :subtitle="subtitle" 
        />

        <form @submit.prevent="save">

            <v-container fluid>

                <v-row 
                    nowrap 
                    dense
                    no-gutters
                >
                    
                    <v-col 
                        v-for="field in dataset" 
                        :key="field.name" 
                        :lg="field.lg" 
                        :md="field.md"
                        :sm="field.sm"
                        class="pa-1"
                        flat
                    >

                        <v-text-field
                            v-if="field.type=='text'"
                            class="ma-2"
                            autofocus
                            v-model="item[field.name]" 
                            type="text"
                            :label="$trnsl(field.text)" 
                            :counter="field.lenght"
                            dense
                        ></v-text-field>

                        <v-text-field
                            v-if="field.type=='number'"
                            class="ma-2"
                            v-model="item[field.name]" 
                            type="number"
                            :label="$trnsl(field.text)" 
                            :prefix="field.prefix"
                            :suffix="field.suffix"
                            dense
                        ></v-text-field>

                        <v-text-field
                            v-if="field.type=='password'"
                            class="ma-2"
                            v-model="item[field.name]" 
                            :append-icon="field.show ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="field.show ? 'text' : 'password'"
                            :label="$trnsl(field.text)" 
                            :counter="field.lenght"
                            dense
                            @click:append="field.show = !field.show"
                        ></v-text-field>

                        <v-text-field
                            v-if="field.type=='date'"
                            class="ma-2"
                            v-model="item[field.name]" 
                            type="date"
                            :label="$trnsl(field.text)" 
                            dense
                        ></v-text-field>

                        <v-text-field
                            v-if="field.type=='email'"
                            class="ma-2"
                            v-model="item[field.name]" 
                            type="email"
                            :label="$trnsl(field.text)" 
                            :prefix="field.prefix"
                            :suffix="field.suffix"
                            dense
                        ></v-text-field>

                        <v-select
                            v-if="field.type=='select'"
                            class="ma-2"
                            :items="field.items"
                            :label="$trnsl(field.text)"
                            item-text="name"
                            item-value="id"
                            dense
                            @input="emitChange"
                        ></v-select>
                        
                        <v-card 
                            v-if="field.type=='radio'"
                            class="my-2"
                            height="60" 
                            flat
                        >   
                            <v-row 
                                dense 
                                no-gutters
                                align="center"
                            >
                                <v-col cols=3>
                                    <p 
                                        class="body-1 text--grey pl-2" 
                                    >
                                        {{ $trnsl(field.text) }}
                                    </p>
                                </v-col>

                                <v-col cols="8">
                                    <v-radio-group
                                        v-model="item[field.name]"
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
                            class="mr-3" 
                            height="55" 
                            flat
                        >
                            <v-row dense>
                                <v-col cols="8">
                                    <p
                                        class="body-1" 
                                        style="color: gray; padding: 15px 0px 0px 10px"
                                    >{{ $trnsl(field.text) }}</p>
                                </v-col>
                                <v-col cols="4" align-self="center">
                                    <v-switch
                                        v-model="item[field.name]"
                                    ></v-switch>
                                </v-col>
                            </v-row>
                        </v-card>

                    </v-col>

                </v-row>

            </v-container>

            <!-- <v-card-actions>
                <v-btn
                    color="dark"
                    @click="close"
                    dark

                >
                    {{ $content.cancel }}
                </v-btn>
                <v-btn
                    color="success"
                    type="submit"
                    dark
                >
                    {{ $content.save }}
                </v-btn>
            </v-card-actions> -->

            
        </form>
    </v-card>
</template>
<script>
    import FormHeaderComponent from './FormHeaderComponent.vue'
    export default {
        components: { FormHeaderComponent },
        props: {
            title: String,
            subtitle: String,
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
            },
            emitChange() {
                console.log('nada')
            }
        }
    }
</script>