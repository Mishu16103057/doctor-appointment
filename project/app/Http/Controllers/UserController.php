<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Language;
use PDF;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
    	$user = Auth::guard('user')->user();
        $current = Appointment::where('patient_id',Auth::guard('user')->user()->id)->whereDate('appointment_date','>=',date('Y-m-d'))->first();
        return view('user.dashboard',compact('user','current'));
    }

    public function profile()
    {
    	$user = Auth::guard('user')->user();

        return view('user.profile',compact('user'));
    }

    public function appointments()
    {
        $user = Auth::guard('user')->user();
    	$currents = Appointment::where('patient_id',Auth::guard('user')->user()->id)->whereDate('appointment_date','>=',date('Y-m-d'))->get();
    	$history = Appointment::where('patient_id',Auth::guard('user')->user()->id)->get();

        return view('user.appointments',compact('currents','history','user'));
    }

    public function resetform()
    {
        $user = Auth::guard('user')->user();
        return view('user.reset',compact('user'));
    }

    public function reset(Request $request)
    {
        $input = $request->all();  
        $user = Auth::guard('user')->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('unsuccess', 'Confirm password does not match.');
                    return redirect()->back();
                }
            }else{
                Session::flash('unsuccess', 'Current password Does not match.');
                return redirect()->back();
            }
        }
        $user->update($input);
        Session::flash('success', 'Successfully updated your password');
        return redirect()->back();
    }

    public function profileupdate(Request $request)
    { 
        $input = $request->all(); 
        //return $input['title'];
        $user = Auth::guard('user')->user(); 
//        if(!in_array(null, $request->title) && !in_array(null, $request->details))
//        {
//            $input['title'] = implode(',', $request->title);
//            $input['details'] = implode(',', $request->details);
//        }
//        else
//        {
//            if(in_array(null, $request->title) || in_array(null, $request->details))
//            {
//                $input['title'] = null;
//                $input['details'] = null;
//            }
//            else
//            {
//                $title = explode(',', $user->title);
//                $details = explode(',', $user->details);
//                $input['title'] = implode(',', $title);
//                $input['details'] = implode(',', $details);
//            }
//        }
            $user = Auth::guard('user')->user();
            if($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/patient-profile',$name);
                if($user->photo != null)
                {
                    unlink(public_path().'/assets/images/patient-profile/'.$user->photo);
                }            
            $input['profile_photo'] = $name;
            } 
        $user->update($input);
      
        return redirect()->route('user-profile')->with('success','Successfully Published The Profile.');
    }

    //Show Appointment Details
    public function appointments_info($id)
    {
        $appointment = Appointment::findOrFail($id);
        return "<tr>
                    <td>Appointment Date</td>
                    <td>".$appointment->appointment_date."</td>
                </tr>
                <tr>
                    <td>Appointment Time</td>
                    <td>".$appointment->appointment_time."</td>
                </tr>
                <tr>
                    <td>Appointment For</td>
                    <td>".$appointment->visit_for."</td>
                </tr>
                <tr>
                    <td>Patient First Name</td>
                    <td>".$appointment->patient_name."</td>
                </tr>
                <tr>
                    <td>Patient Last Name</td>
                    <td>".$appointment->patient_last_name."</td>
                </tr>
                <tr>
                    <td>Patient Phone</td>
                    <td>".$appointment->patient_phone."</td>
                </tr>
                <tr>
                    <td>Patient Email</td>
                    <td>".$appointment->patient_email."</td>
                </tr>
                <tr>
                    <td>Patient Insurance</td>
                    <td>".$appointment->patient_insurance."</td>
                </tr>
                <tr>
                    <td>Insurance Plan</td>
                    <td>".($appointment->insurance_plan != "" ? $appointment->insurance_plan:"None")."</td>
                </tr>
                <tr>
                    <td>Patient First Visit</td>
                    <td>".$appointment->patient_visit."</td>
                </tr>
                <tr>
                    <td>Appointment Booking Date</td>
                    <td>".$appointment->created_at."</td>
                </tr>
                <tr>
                    <td colspan='2'>Comments</td>
                </tr>
                <tr>
                    <td colspan='2'>".$appointment->comments."</td>
                </tr>
                ";
    }

    public function generatePDF($id){

        
        $data = [
            'title' => 'Welcome to Doctor Apointment',
            'appointment' => Appointment::findOrFail($id),
            
        ];
        
        $pdf = PDF::loadView('pdf', $data);
    
        return $pdf->download('doctor.pdf');
    }


    public function publish()
    {
        $user = Auth::guard('user')->user();
        $user->status = 1;
        $user->active = 1;
        $user->update();
        return redirect(route('user-dashboard'))->with('success','Successfully Published The Profile.');
    } 

    public function feature()
    {
        $user = Auth::guard('user')->user();
        $user->is_featured = 1;
        $user->featured = 1;
        $user->update();
        return redirect(route('user-dashboard'))->with('success','Successfully Featured The Profile.');
    } 

}
