<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\ToDo;


class TodoController extends Controller
{
    //
    public function index() {
        $todos = Todo::all();
        return view('todolist.index', ['todos' => $todos]);
    }

    public function store (StoreRequest $request) {
        $todo = new Todo;
        $todo->comment = $request->comment;
        $todo->save();
        return redirect('/');
    }
}
