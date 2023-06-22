<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
            $domain = substr(strrchr($incomingData['email'], "@"), 1);
            if($domain == 'internet.com') {
                return redirect('/admin/dashboard');
            }
            else {
                return redirect('/member/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $req)
    {
        $incomingData = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($req->fails()) {
            return redirect()->back()->withErrors($req->errors())->withInput();
        }

        $user = new User();
        $user->name = $incomingData['name'];
        $user->email = $incomingData['email'];
        $user->password = bcrypt($incomingData['password']);

        $domain = substr(strrchr($incomingData['email'], "@"), 1);

        if($domain == 'internet.com') {
            $admin_role = Role::create(['name' => 'admin']);
            $user->assignRole($admin_role);
            $user->save();

            auth()->login($user);
    
            return redirect('/admin/dashboard');
        }
        else {
            $user_role = Role::create(['name' => 'member']);
            $user->assignRole($user_role);
            $user->save();

            auth()->login($user);
    
            return redirect('/member/dashboard');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/home');
    }

    public function changepassword(Request $req) {
        $incomingData = $req->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8|confirmed',
        ]);

        // check old password to be same as current password. then change it to new pasword
        $user = auth()->user();
        if (!password_verify($incomingData['oldpassword'], $user->password)) {
            return back()->withErrors([
                'oldpassword' => 'The provided credentials do not match our records.',
            ]);
        }
        else {
            $user->password = bcrypt($incomingData['newpassword']);
            $user->save();
        }

        return redirect('/profile');
    }

    public function allUserRole() {
        // All users that have role of user
        $users = User::role('member')->get();
        return view('/admin/dashboard', ['users' => $users]);
    }

}
