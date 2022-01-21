<?php

namespace App\Http\Controllers\Doctor;

use App\Department;
use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class DoctorRegisterController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:doctor', ['except' => ['logout']]);
    }

    public function showRegisterForm()
    {
      $deps=Department::get();
      return view('doctor.register',compact('deps'));
    }
    public function register(Request $request)
    {
      // Validate the form data

     
      $this->validate($request, [
        'email'   => 'required|email|unique:doctors',
        'password' => 'required|confirmed',
        'doctor_name'=>'required|unique:doctors',
        'qualification'=>'required',
        'photo'=>'required',

      ]);
      if ($file = $request->file('photo')) 
      {      
         $name = time().$file->getClientOriginalName();
         $file->move('assets/images',$name);           
         $data['photo'] = $name;
     } 

        $doctor = new Doctor();
        
        $input = $request->all();
        $input['doctor']=$request->department;        
        $input['password'] = bcrypt($request['password']);
        $doctor->fill($input)->save();
        $schedule = Schedule::where('doctorid',0)->first();
        $new = new Schedule();

        $new->doctorid=$doctor->id;
        $new->monday_start=$schedule->monday_start;
        $new->tuesday_start=$schedule->tuesday_start;
        $new->wednesday_start=$schedule->wednesday_start;
        $new->thursday_start=$schedule->thursday_start;
        $new->friday_start=$schedule->friday_start;
        $new->saturday_start=$schedule->saturday_start;
        $new->sunday_start=$schedule->sunday_start;
        $new->monday_end=$schedule->monday_end;
        $new->tuesday_end=$schedule->tuesday_end;
        $new->wednesday_end=$schedule->wednesday_end;
        $new->thursday_end=$schedule->thursday_end;
        $new->friday_end=$schedule->friday_end;
        $new->saturday_end=$schedule->saturday_end;
        $new->sunday_end=$schedule->sunday_end;
        $new->sunday_times=$schedule->sunday_times;
        $new->monday_times=$schedule->monday_times;
        $new->tuesday_times=$schedule->tuesday_times;
        $new->wednesday_times=$schedule->wednesday_times;
        $new->thursday_times=$schedule->thursday_times;
        $new->friday_times=$schedule->friday_times;
        $new->saturday_times=$schedule->saturday_times;
        $new->accepted_insurance=$schedule->accepted_insurance;

        $new->save();
        Auth::guard('doctor')->login($doctor); 
        return redirect()->route('doctor-dashboard');
    }
}
