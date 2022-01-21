<?php

namespace App\Http\Controllers\Doctor;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DoctorUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:doctor');
    }

    public function index()
    {


        $users = Appointment::where('doctorid',Auth::guard('doctor')->user()->id)->get();
        foreach($users as $us){

            $patient=User::where('id',$us->patient_id)->get();

        }
        return view('doctor.user.index',compact('users','patient'));
    }
    public function appointment_history($id)
    {
        $user = User::findOrFail($id);
        $appoints = Appointment::where('patient_id', '=', $id)->orderBy('id','desc')->get();
        return view('doctor.user.history',compact('appoints','user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('doctor.user.edit',compact('user'));
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);
        Appointment::where('patient_id','$id')->delete();

        //unlink(public_path().'/assets/images/'.$user->photo);
        $user->delete();
        Session::flash('success', 'Patient Deleted Successfully.');
        return redirect()->route('admin-user-index');
    }

    public function user_info($id)
    {
        $user = User::findOrFail($id);
        return "<tr>
                    <td colspan='2' class='text-center'><img src=".($user->profile_photo ? asset('assets/images/patient-profile/'.$user->profile_photo):'http://fulldubai.com/SiteImages/noimage.png')." alt=\"Donor's Photo\" style=\"max-height: 300px; width: 250px;\"></td>
                </tr>
                <tr>
                    <td>Joined</td>
                    <td>".$user->created_at->diffForHumans()."</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>".$user->name."</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>".$user->email."</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>".$user->phone."</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>".$user->address."</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>".$user->age."</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>".$user->gender."</td>
                </tr>
                <tr>
                    <td>Fax</td>
                    <td>".$user->fax."</td>
                </tr>
                
                <tr>
                    <td colspan='2'>More Information</td>
                </tr>
                <tr>
                    <td colspan='2'>".$user->my_info."</td>
                </tr>
                ";
    }
}
