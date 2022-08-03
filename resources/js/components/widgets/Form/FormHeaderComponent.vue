<template>
    <div id="header">
        <p id="header-title">{{ title }}</p>
        <p id="header-subtitle">{{ subtitle }}</p>
    </div>
</template>
<script>
    export default {
        props: {
            title: String,
            subtitle: String
        }
    }
</script>

<style>
    #header {
       display: block; 
       border-bottom: 1px solid lightgrey
    }

    #header-title{
        display: block; 
        margin: 5px 0px 0px 10px;
        font-size: 1.1rem;
        font-weight: bold;    
    }

    #header-subtitle{
        display: block; 
        margin: 0px 0px 5px 10px;
        font-size: 0.7rem;
    }
</style>
