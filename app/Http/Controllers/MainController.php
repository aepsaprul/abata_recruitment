<?php

namespace App\Http\Controllers;

use App\Models\LokerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function register() {
        return view('auth.register');
    }

    function save(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:loker_users',
            'password' => 'required|min:5|max:12'
        ]);

        // insert data
        $loker_user = LokerUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $request->session()->put('LoggedUser', $loker_user->id);
        return redirect()->route('auth.dashboard');
    }

    function check(Request $request)
    {
        // validate request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = LokerUser::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'email tidak ada');
        } else {
            // cek password
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect()->route('auth.dashboard');
            } else {
                return back()->with('fail', 'password salah');
            }

        }

    }

    function logout() {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard() {
        $data = ['LoggedUserInfo' => LokerUser::where('id', '=', session('LoggedUser'))->first()];
        return view('user.dashboard', $data);
    }
}
