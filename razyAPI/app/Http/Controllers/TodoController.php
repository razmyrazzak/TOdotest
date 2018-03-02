<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function showAllTods(){
        return new JsonResponse([
            Todo::all()
        ]);

    }

    public function store( Request $request ){
        return response()->json(Todo::create( $request->all() ));
    }


}