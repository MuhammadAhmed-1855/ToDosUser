<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //

    public function index() {
        return view('welcome', ['todos' => Todo::all()]);
    }

    public function markComplete($id) {
        $todo = Todo::find($id);
        $todo->completed = true;
        $todo->save();

        return redirect('/dashboard');
    }

    public function markIncomplete($id) {
        $todo = Todo::find($id);
        $todo->completed = false;
        $todo->save();

        return redirect('/dashboard');
    }

    public function AddTodo(Request $req) {
        $todo = new Todo;
        $todo->title = $req->title;
        $todo->description = $req->description;
        $todo->completed = false;
        $todo->save();

        return redirect('/dashboard');
    }
}
