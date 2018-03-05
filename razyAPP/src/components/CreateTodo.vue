<template>
    <div class='ui basic content center aligned segment'>
        <button class='ui basic button icon' v-on:click="openForm" v-show="!creating">
            <i class='plus icon'></i>
        </button>
        <div class='ui centered card' v-show="creating">
            <div class='content'>
                <div class='ui form'>
                    <div class='field'>
                        <label>Description</label>
                        <input v-model="description" type='text' ref='description' defaultValue="">
                    </div>
                    <div class='ui two button attached buttons'>
                        <button class='ui basic blue button' v-on:click="sendData">
                            Create
                        </button>
                        <button class='ui basic red button' v-on:click="closeForm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import axios from "axios";
    import VueResource from 'vue-resource'
    import api from'../api/api'

    export default {
        data() {
            return {
                description: '',
                creating: false,
            };
        },
        methods: {
            openForm() {
                this.creating = true;
            },
            closeForm() {
                this.creating = false;
            },
            sendData(){
                if (this.description.length > 0 ) {
                    const  description = this.description;
                    api.post('api/todosCreate', {description:this.description}, {emulateJSON:true}).then((res) => {

                    });
                    this.$emit('create-todo',{})

                }
                this.creating = false;



            },
        },
    };
</script>