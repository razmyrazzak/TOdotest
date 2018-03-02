<template>
  <div>
    <!-- Render the TodoList component-->
     <!--TodoList becomes-->
    <todo-list v-bind:todos="todos"></todo-list>
  </div>
</template>

<script>
  import TodoList from './components/TodoList'

export default {
  name: 'app',
  components: {
    TodoList,
  },
  data(){
    return {
      todos:[{
      }]
    }
  },
  methods: {
    getTodos: function () {
      $.ajax({
        context: this,
        url: "/api/todos",
        success: function ( result ) {
          this.$set( "todos" ,result )
        }
      })
    },
//    onCreate: function (e) {
//      e.preventDefault()
//      $.ajax({
//        context:this,
//        type:"POST",
//        data:{
//          test:this.test,
//          test2:this.test2
//        },
//        url: "api/todocreate",
//        success:function (result) {
//          this.
//        }
//      })
//    }

  },
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
