<template>
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
                    :type="text"
                    :label="field.text" 
                    :counter="field.lenght"
                    dense
                ></v-text-field>

                <v-text-field
                    v-if="field.type=='number'"
                    class="ma-2"
                    v-model="item[field.name]" 
                    type="number"
                    :label="field.text" 
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
                    :label="field.text" 
                    :counter="field.lenght"
                    dense
                    @click:append="field.show = !field.show"
                ></v-text-field>

                <v-text-field
                    v-if="field.type=='date'"
                    class="ma-2"
                    v-model="item[field.name]" 
                    type="date"
                    :label="field.text" 
                    dense
                ></v-text-field>

                <v-text-field
                    v-if="field.type=='email'"
                    class="ma-2"
                    v-model="item[field.name]" 
                    type="email"
                    :label="field.text" 
                    :prefix="field.prefix"
                    :suffix="field.suffix"
                    dense
                ></v-text-field>

                <v-select
                    v-if="field.type=='select'"
                    class="ma-2"
                    :items="field.items"
                    :label="field.text"
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
                                {{ field.text }}
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
                            >{{ field.text }}</p>
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
</template>
<script>
    export default {
        props: {
            dataset: Array,
            
        }
    }
</script>