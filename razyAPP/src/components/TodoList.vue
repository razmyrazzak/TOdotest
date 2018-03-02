<template>
    <div>
        <todo  v-for="todo in todos" v-bind:todo="todo"></todo>
    </div>
</template>

<script type = "text/javascript" >
    import Todo from './Todo';

    export default {
        props: ['todos'],
        components: {
            Todo,
        },


    };
</script>
<style>
</style>