<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Appointment;
use App\Schedule;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\Slider;
use App\Specialist;
use App\Service;
use App\Resume;
use App\Counter;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $patients = User::all();
        $sps = Specialist::all();
        $services = Service::all();
        $resumes = Resume::all();

        $appointsToday = Appointment::whereDate('appointment_date', '=', date('Y-m-d'))->orderBy('id','desc')->get();
        $appointsPending = Appointment::where('status', '=', 1)->orderBy('id','desc')->get();
        $appointsComplete = Appointment::where('status', '=', 2)->orderBy('id','desc')->get();


        $referrals = Counter::where('type','referral')->orderBy('total_count','desc')->take(5)->get();
        $browsers = Counter::where('type','browser')->orderBy('total_count','desc')->take(5)->get();
        return view('admin.index',compact('patients','sps','services','resumes','referrals','browsers','appointsToday','appointsComplete','appointsPending'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
    public function profileupdate(Request $request)
    {
        $input = $request->all();  
        
        $admin = Auth::guard('admin')->user();        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                          
            $input['photo'] = $name;
            } 

        $admin->update($input);
        
        return redirect()->route('admin-profile-info')->with('success','Successfully Updated The Information.');;
    }

    public function info()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.info',compact('admin'));
    }

    public function infoup(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->update($request->all());
        return redirect()->route('admin-info')->with('success','Successfully Updated The Information.');;
    }

    public function proinfo()
    {
        $admin = Auth::guard('admin')->user();
        if($admin->pareas != null)
        {
            $pareas = explode(',', $admin->pareas);            
        }
        return view('admin.proinfo',compact('admin','pareas'));
    }

    public function proinfoup(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $data = $request->all();
        if (!empty($request->pareas)) 
         {
            $data['pareas'] = implode(',', $request->pareas);       
         }
        if (empty($request->pareas)) 
         {
            $data['pareas'] = null;       
         }
        $admin->update($data);
        return redirect()->route('admin-proinfo')->with('success','Successfully Updated The Information.');;
    }

    public function schedule(){
        $schedule = Schedule::where('doctorid',1)->first();
        return view('admin.schedule',compact('schedule'));
    }

    //Show Schedule Form
    

    

    public function video()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.video',compact('admin'));
    }

    public function videoup(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $url = $request->vid;

        if ( (strpos($url, 'youtube') !== false) || (strpos($url, 'vimeo') !== false) ) 
        {
            $input = $request->all();
                if ($file = $request->file('vidimg')) 
                {    
                    $name = time().$file->getClientOriginalName();
                    $file->move('assets/images',$name);
                    if($admin->vidimg != null)
                    {
                        unlink(public_path().'/assets/images/'.$admin->vidimg);
                    }            
                $input['vidimg'] = $name;
                } 
            $admin->update($input);
            return redirect()->route('admin-video')->with('success','Successfully Updated The Information.');
        }

        else
        {
        return redirect()->route('admin-video')->with('unsuccess','The URL is Invaild.');        
        }
    }

    public function proimg()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.proimg',compact('admin'));
    }

    public function proimgup(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $input = $request->all();
            if ($file = $request->file('fimg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($admin->fimg != null)
                {
                    unlink(public_path().'/assets/images/'.$admin->fimg);
                }            
            $input['fimg'] = $name;
            } 
        $admin->update($input);
        return redirect()->route('admin-')->with('success','Successfully Updated The Information.');;
    }

    public function img()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.pimg',compact('admin'));
    }

    public function imgup(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $input = $request->all();
            if ($file = $request->file('pimg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($admin->pimg != null)
                {
                    unlink(public_path().'/assets/images/'.$admin->pimg);
                }            
            $input['pimg'] = $name;
            } 
        $admin->update($input);
        return redirect()->route('admin-proimg')->with('success','Successfully Updated The Information.');;
    }

    public function simg()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.spimg',compact('admin'));
    }

    public function simgup(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $input = $request->all();
            if ($file = $request->file('simg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($admin->simg != null)
                {
                    unlink(public_path().'/assets/images/'.$admin->simg);
                }            
            $input['simg'] = $name;
            } 
        $admin->update($input);
        return redirect()->route('admin-special')->with('success','Successfully Updated The Information.');;
    }

    public function bimg()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.bimg',compact('admin'));
    }

    public function bimgup(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $input = $request->all();
            if ($file = $request->file('bimg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($admin->bimg != null)
                {
                    unlink(public_path().'/assets/images/'.$admin->bimg);
                }            
            $input['bimg'] = $name;
            } 
        $admin->update($input);
        return redirect()->route('admin-back')->with('success','Successfully Updated The Information.');;
    }

    public function update(UpdateValidationRequest $request)
    {
        $input = $request->all();  
        $admin = Auth::guard('admin')->user();        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($admin->photo != null)
                {
                    unlink(public_path().'/assets/images/'.$admin->photo);
                }            
            $input['photo'] = $name;
            } 

        $admin->update($input);
        Session::flash('success', 'Successfully updated your ');
        return redirect()->back();
    }


    public function passwordreset()
    {
        return view('admin.reset-password');
    }

    public function changepass(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $admin->password)){
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
        $admin->update($input);
        Session::flash('success', 'Successfully updated your password');
        return redirect()->back();
    }
    public function details($id){

        $user = User::findOrFail($id);
        return view('user.details',compact('user'));

    }
    
}
