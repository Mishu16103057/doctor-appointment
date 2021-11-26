<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\User;

class UserRegisterController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
    }


 	public function showRegisterForm()
    {
      return view('user.register');
    }

    public function register(Request $request)
    {
      // Validate the form data

      Session::flash('page',"register");
      $this->validate($request, [
        'email'   => 'required|email|unique:user_profiles',
        'password' => 'required|confirmed'
      ]);

        $user = new User;
        $input = $request->all();        
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();
        Auth::guard('user')->login($user); 
        return redirect()->route('user-dashboard');
    }
  
}