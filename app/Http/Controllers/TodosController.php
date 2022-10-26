<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * index para mostrar todos los todos
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formulario de edicion
     **/
    public function store(Request $request){
        // Validamos
        $request -> validate([
            'title' => 'required|min:3'
        ]);
        // Creamos el objeto y asignamos los valores
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();
        // redirigiendo al usuaro a la ruta todos con succes
        return redirect()->route('todos')->with('success','Tarea creada correctamente');
    }

    public function index(){
        $todos = TOdo::all();
        return view('todos.index', ['todos'=> $todos]);
    }
}
