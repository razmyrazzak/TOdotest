<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Todo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'status',
    ];

    public static function editTodoById( Request $request ){
        try{
            $data = [
                "description" => $request->input('description'),
                "status" =>  $request->input('status')
            ];
            $todo = Todo::find( $request->input('id') );
            return $todo->update( $data );

        }
        catch (\Exception $e){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
    }

    public static function deleteTodoById( $id ){
        try{
            $todo = Todo::find( $id );
            $todo->delete();
            return true ;
        }
        catch (\Exception $e){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
    }

    public static function updateStatus( $id ){
        try{
            $todo = Todo::find($id);
            $todo->status = 1;
            $todo->save();
            return $todo;
        }
        catch (\Exception $e){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
    }
}