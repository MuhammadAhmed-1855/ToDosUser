<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    public function login(Request $req)
    {
        $incomingData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt([ 'email' => $incomingData['email'], 'password' => $incomingData['password'] ])) {
            $req->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $req)
    {
        print_r($req->input());
        $incomingData = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = new User();
        $user->name = $incomingData['name'];
        $user->email = $incomingData['email'];
        $user->password = bcrypt($incomingData['password']);
        $user->save();

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function logout() {
        auth()->logout();
        return redirect('/home');
    }
}
