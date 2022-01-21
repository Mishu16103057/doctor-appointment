<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DoctorLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:doctor', ['except' => ['logout']]);
    }
    public function login(Request $request)
    {
      
		$this->validate($request,[
		    'email' => 'required|email',
		    'password' => 'required',
		]);

      
      if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
       
        return redirect()->intended(route('doctor-dashboard'));
      }

     
      Session::flash('message',"f");
      Session::flash('page',"login");
      return redirect()->back()->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/');
    }    

}
