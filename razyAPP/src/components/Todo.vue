<template>
    <div class='ui centered card'>
        <div class="content" v-show="!editing">
            <div class='header'>
                {{ todo.description }}
            </div>
            <div class='extra content'>
          <span class='right floated edit icon' v-on:click="visibleForm">
          <i class='edit icon'></i>
        </span>
                <span class='right floated trash icon' v-on:click="deleteTodo(todo)" >
          <i class='trash icon'></i>
        </span>
            </div>
        </div>
        <div class="content" v-show="editing">
            <div class='ui form'>
                <div class='field'>
                    <label>Discription</label>
                    <input type='text'  v-model="description" ref='description' >
                    <input type='hidden' v-model="id" >
                </div>
                <div class='ui two button attached buttons'>
                    <button class='ui basic blue button' v-on:click="hideForm">
                        Close X
                    </button>
                    <button class='ui basic blue button' v-on:click="updateForm">
                        Update
                    </button>
                </div>
            </div>
        </div>
        <div class='ui bottom attached green basic button' v-show="!editing && todo.status" disabled>
            Completed
        </div>
        <div class='ui bottom attached red basic button' v-on:click="updateStatus(todo)" v-show="!editing && !todo.status">
            Pending
        </div>
    </div>
</template>

<script type="text/javascript">
    import api from'../api/api'
    import Vue from 'vue'
    import app from '../App.vue'
    export default {
        props: ['todo'],
        data() {
            return {
                editing: false,
                description: '',
                id:'',
            };
        },
        methods: {
            visibleForm() {
                this.editing = true;
                this.description = this.todo.description;
                this.id = this.todo.id;
            },
            hideForm() {
                this.editing = false;

            },
            updateForm: function (e) {
                var new_data = '';
                e.preventDefault();
                if (this.description.length > 0 ) {
                    const description = this.description;
                    api.post('api/todosEdit', {id:this.id,description:this.description}, {emulateJSON:true}).then(function(res){
                     })
                 }
                this.$emit('update-todo',this.todo,this.description)
                this.editing = false;

            },
            // pass todo to parent
            updateStatus(todo) {
                const id = todo.id;
                api.get( 'api/todoStatus/'+id ).then(function(res){
                })
                //generate event
                this.$emit('status-update',todo)

            },
            //pass delete data to parent
            deleteTodo(todo){
                const id = todo.id;
                api.get( 'api/todoDelete/'+id ).then(function(res){
                })
                this.$emit('delete-todo', todo)
            }

        }
    };
</script>