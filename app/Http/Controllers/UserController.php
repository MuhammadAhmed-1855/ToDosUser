<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login(Request $req)
    {
        return $req->input();
    }

    public function register(Request $req)
    {
        print_r($req->input());
    }
}
