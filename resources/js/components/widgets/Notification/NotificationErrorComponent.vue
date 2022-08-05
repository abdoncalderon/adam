<template>
    <v-alert
            v-if="error"
            type="error"
            dark
            dense
            dismissible
        >
            {{ error }}
        </v-alert>
</template>
<script>
export default {
    props: {
        error: Error,
    },
    created() {
        this.error = null
    }
}
</script>