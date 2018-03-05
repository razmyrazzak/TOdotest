<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function showAllTods(){
        return response()->json( Todo::all() );
    }

    public function store( Request $request ){
        return response()->json( Todo::create( $request->all() ));
    }

    public function edit( Request $request ){
        $todo = Todo::editTodoById( $request );
        return response()->json( $todo );
    }

    public function updateStatus( $id ){
        $todo = Todo::updateStatus( $id );
        return response()->json( $todo );
    }

    public function delete( $id ){
        $todo = Todo::deleteTodoById( $id );
        return response()->json( $todo );
    }


}