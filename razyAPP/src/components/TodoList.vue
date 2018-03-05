<template>
    <div>
        <h1 class="appHeading">This Demo TODO APP</h1>
        <todo  v-on:delete-todo="deleteTodo" v-on:status-update="statusUpdate" v-on:update-todo="updateTodos" v-on:complete-todo="completeTodo" v-for="todo in todos" :todo.sync="todo"></todo>
    </div>

</template>

<script type = "text/javascript" >
    import sweetalert from 'sweetalert'
    import api from'../api/api'
    import Todo from './Todo'

    export default {
        props: ['todos'],
        components: {
            Todo,
        },
        data(){
            return {
                editing: false,
            }
        },
        methods: {
            completeTodo(todo) {

            },
            //update todo
            updateTodos(todo,description){
                const todoIndex = this.todos.indexOf(todo);
                this.todos[todoIndex].description = description;
                sweetalert('Success!', '*****ToDo Update completed*****', 'success');
            },
            //change todo status
            statusUpdate(todo){
                const todoIndex = this.todos.indexOf(todo);
                this.todos[todoIndex].status = true;
                sweetalert('Success!', '*****ToDo completed*****', 'success');
            },
            //update this todo list after delete
            deleteTodo(todo){
                const todoIndex = this.todos.indexOf(todo);
                console.log(todoIndex)
                this.todos.splice(todoIndex, 1)
                sweetalert('Success!', '*****ToDo Deleted*****', 'success');
            }
        },
    };
</script>
<style>
    .appHeading{
        text-align: center;
    }
</style>