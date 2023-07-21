<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\UserTodos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TodosController extends Controller
{
    //

    public function todos() {
        $todos = Todo::where('user_id', auth()->user()->id)->get();
        return view('dashboard', ['listItems' => $todos]);
    }

    public function mark($id) {
        $todo = Todo::find($id);
        if($todo->completed == false) {
            $todo->completed = true;
        }
        else {
            $todo->completed = false;
        }
        $todo->save();

        return redirect('/dashboard');
    }

    public function AddTodo(Request $req) {

        print_r($req->input());

        $todo = new Todo;
        $todo->title = $req->title;
        $todo->description = $req->description;
        $todo->completed = false;
        $todo->user_id = auth()->user()->id;
        $todo->save();

        return redirect('/dashboard');
    }
}
