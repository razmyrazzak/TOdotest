<?php

namespace Tests;


use App\Todo;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ToDoTest extends TestCase
{

    /**
     * use database migration on every test so the database will be empty before the test
     */
    use DatabaseMigrations;

    /**
     * Test todos create function
     */
    public function testCreateToDo(){
        $response = $this->post('/api/todosCreate', ['description' => 'TEST'])
            ->seeJson(['description'=>'TEST']);
    }


    /**
     * test show list of todos api
     */
    public function testListTodo(){

        Todo::create([
            'description' => 'TEST_LIST'
        ]);
        $this->get('/api/todos')
        ->seeJson(['description'=>'TEST_LIST']);
    }

    public function testDeleteTodo(){
        $todo = Todo::create([
            'description' => 'Delete_Todo'
        ]);
        $response = $this->call( 'GET', 'api/todoDelete/'.$todo->id );
        $this->assertEquals(200, $response->status());
    }

    public function testEditTodo(){
        $todo = Todo::create([
            'description' => 'Edit_Todo'
        ]);
        //update/edit the above created todos
        $this->post('/api/todosEdit', ['id'=>$todo->id , 'description' => 'Updated_Todo']);

        // call the list all api and check for the updated todos
        $this->get('/api/todos')
            ->seeJson(['description'=>'Updated_Todo']);
    }

}
