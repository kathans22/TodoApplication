<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('todos.index', ['todos' => $todos]);

        //return view('todos.index');
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        // Todo::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'is_Completed' => 0
        // ]);

        Todo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'is_completed' => $request->input('is_completed', false), // Set default value if not provided
        ]);


        $request->session()->flash('alert-success','Todo Created Succesfully');

        return to_route('todos.index');


    }


    public function show($id)
    {
        return $id;
    }
}