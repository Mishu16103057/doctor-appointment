<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function appointment_history($id)
    {
        $user = User::findOrFail($id);
        $appoints = Appointment::where('patient_id', '=', $id)->orderBy('id','desc')->get();
        return view('admin.user.history',compact('appoints','user'));
    }

    public function status($id1,$id2)
    {
        $user = User::findOrFail($id1);
        $user->active = $id2;
        $user->featured = $id2;
        $user->update();
        if($id2 == 1)
        Session::flash('success', 'Successfully Activated The Patient.');
            else
        Session::flash('success', 'Successfully Deactivated The Patient.');

        return redirect()->route('admin-user-index');
    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.user.create',compact('cats'));
    }

    public function store(StoreValidationRequest $request)
    {
        $user = new User;
        $input = $request->all();        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
            $input['photo'] = $name;
            } 

            if($request->featured == "")
            {
                $input['featured'] = 0;
            }
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();
        Session::flash('success', 'New HandyMan added successfully.');
        return redirect()->route('admin-user-index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    //Show Appointment Details
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

    public function update(UpdateValidationRequest $request,$id)
    {

        $input = $request->all(); 
        $user = User::findOrFail($id);        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/patient-profile',$name);
                if($user->photo != null)
                {
                    unlink(public_path().'/assets/images/patient-profile/'.$user->photo);
                }            
            $input['photo'] = $name;
            } 

        if(!empty($input['password'])){
        $input['password'] = bcrypt($request['password']);

        }
        else{
         $input['password'] = $user->password;    
        } 
        if($request->featured == "")
        {
            $input['featured'] = 0;
        }
        $user->update($input);
        Session::flash('success', 'Successfully updated the Patient.');
        return redirect()->route('admin-user-index');
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
}


