<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\ToDo;


class TodoController extends Controller
{
    //
    public function index(Request $request) {

        if ($request->has('status')) {
            $request->session()->put('status', $request->input('status'));
        }
        $status = $request->session()->get('status');

        if ($status === 'works'){
            $todos = Todo::where('state', false)->get();
            return view('todolist.index', compact('todos', 'status'));
        }

        if($status === 'complete') {
            $todos = Todo::where('state', true)->get();
            return view('todolist.index', compact('todos', 'status'));
        }

        $todos = Todo::all();
        return view('todolist.index', ['todos' => $todos, 'status' => 'all']);
    }

    public function store (StoreRequest $request) {
        $todo = new Todo;
        $todo->comment = $request->comment;
        $todo->save();
        return redirect('/');
    }

    public function delete($id)
    {
        $todo = todo::find($id);
        $todo->delete();
        return redirect('/');
    }

    public function patch($id)
    {
        $todo = todo::find($id);
        $todo->state = !$todo->state;
        $todo->save();
        return redirect('/');
    }
}
