<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

public function registerPost(Request $request)
{
$user = new User();
$user->name = $request->name;
$user->email = $request->email;
$user->password = Hash::make($request->password);
$user->save();
return back()->with('success', 'Register successfully');
}

public function login()
{
return view('login');
}
use Illuminate\Support\Facades\Auth;
public function loginPost(Request $request)
{
$credetials = [
'email' => $request->email,
'password' => $request->password,
];
if (Auth::attempt($credetials)) {
return redirect('/home')->with('success', 'Login berhasil');
}
return back()->with('error', 'Email or Password salah');
}
