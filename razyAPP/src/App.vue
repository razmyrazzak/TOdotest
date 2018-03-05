<template>
  <div>
    <!-- Render the TodoList component-->
     <!--TodoList becomes-->
    <todo-list v-bind:todos="todos" ></todo-list>
    <create-todo v-on:create-todo="createTodo"></create-todo>
  </div>
</template>v-on:create-todo="createTodo"

<script>
  import TodoList from './components/TodoList'
  import CreateTodo from './components/CreateTodo'
  import Todo from './components/Todo'
  import api from'./api/api'
  import sweetalert from 'sweetalert'

export default {
  name: 'app',
  components: {
    TodoList,
    CreateTodo,
    Todo,
  },
  data() {
    return {
      todos: [],
      description: '',
    };
  },

  methods: {

    //load all todos on page landing or loading
    getTodos(){
      api.get('api/todos').then(res => {this.todos = res.data;
        })
              .catch(response => {
                console.log(response);
              });
    },
    createTodo(){
      this.getTodos();
      sweetalert('Success!', '*****ToDo Created*****', 'success');

    },
  },
  mounted(){
    this.getTodos();
  },



}
</script>
