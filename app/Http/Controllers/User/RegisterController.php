<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{
    protected $Users;

    public function __construct(User $Users)
    {
        $this->Users = $Users;
    }

    public function register(Request $req)
    {
        $incomingData = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = new $this->Users;
        $user->name = $incomingData['name'];
        $user->email = $incomingData['email'];
        $user->password = bcrypt($incomingData['password']);
        $user->save();

        auth()->login($user);

        $ip = $req->ip();
        Cookie::queue('ip', $ip, 60);

        return response( redirect('/dashboard') );
    }
}

?>