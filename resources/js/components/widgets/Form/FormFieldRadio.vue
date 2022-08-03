<template>
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
                <p class="body-1 text--grey pl-2">
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
</template>
<script>
export default {
    props:{
        field: Object,
        item: Array
    }
}
</script>