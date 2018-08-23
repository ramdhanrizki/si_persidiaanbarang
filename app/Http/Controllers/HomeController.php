<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function update_profile(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id); 
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        if(!empty($request->input('password')))
        {
            $user->password =Hash::make($request->input('password'));
        }
        $user->update();
        return redirect('profile')->with('success','Profile Berhasil diupdate');
    }
}
