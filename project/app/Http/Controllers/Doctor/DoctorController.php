<?php

namespace App\Http\Controllers\Doctor;

use App\Appointment;
use App\Counter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resume;
use App\Schedule;
use App\Service;
use App\Specialist;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:doctor');
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
        return view('doctor.index',compact('patients','sps','services','resumes','referrals','browsers','appointsToday','appointsComplete','appointsPending'));
    }
    public function schedule($id){
        $schedule = Schedule::where('doctorid',$id)->first();
        return view('doctor.schedule',compact('schedule'));
    }
    public function scheduletimes(Request $request)
    {
      
        $date = date('Y-m-d');
        $day = $request->day;
        $start = $request->start;
        $end = $request->end;
        $begain = strtotime($date." ".$start);
        $sch = "";
        $hourss = round((strtotime($date." ".$end) - strtotime($date." ".$start)) / 3600);
        $hours= $hourss*60;
        
        for ($i=20;$i<=$hours;$i+=20){
            $tmstamp = $begain;
            if ($i != 20){
                $tmstamp = strtotime('+20 min',$begain);
            }
            $apptime1 = date('H:i',$tmstamp);
            $apptime2 = date('H:i',$tmstamp)."<br>";
            $sch.= '<label class="checkbox-inline"><input type="checkbox" name="'.$day.'_times[]" value="'.$apptime1.'" checked>'.$apptime1.'</label>';
            $begain = $tmstamp;
        }
       
        return $sch;
    }
    public function  schedule_save(Request $request)
        {

        $schedule = Schedule::where('doctorid',Auth::guard('doctor')->user()->id)->first();

        $input['sunday_start']=$request->sunday_start;
        $input['monday_start']=$request->monday_start;
        $input['tuesday_start']=$request->tuesday_start;
        $input['wednesday_start']=$request->wednesday_start;
        $input['thursday_start']=$request->thursday_start;
        $input['friday_start']=$request->friday_start;
        $input['saturday_start']=$request->saturday_start;

        $input['sunday_end']=$request->sunday_end;
        $input['monday_end']=$request->monday_end;
        $input['tuesday_end']=$request->tuesday_end;
        $input['wednesday_end']=$request->wednesday_end;
        $input['thursday_end']=$request->thursday_end;
        $input['friday_end']=$request->friday_end;
       


       
       
        $sunday_times = "";
        $monday_times = "";
        $tuesday_times = "";
        $wednesday_times = "";
        $thursday_times = "";
        $friday_times = "";
        $saturday_times = "";



        foreach ($request->sunday_times as $sunday){
            $sunday_times .= $sunday.',';
        }
        foreach ($request->monday_times as $monday){
            $monday_times .= $monday.',';
        }

        foreach ($request->tuesday_times as $tuesday){
            $tuesday_times .= $tuesday.',';
        }

        foreach ($request->wednesday_times as $wednesday){
            $wednesday_times .= $wednesday.',';
        }

        foreach ($request->thursday_times as $thursday){
            $thursday_times .= $thursday.',';
        }

        foreach ($request->friday_times as $friday){
            $friday_times .= $friday.',';
        }

        foreach ($request->saturday_times as $saturday){
            $saturday_times .= $saturday.',';
        }

        $input['sunday_times'] = rtrim($sunday_times,',');
        $input['monday_times'] = rtrim($monday_times,',');
        $input['tuesday_times'] = rtrim($tuesday_times,',');
        $input['wednesday_times'] = rtrim($wednesday_times,',');
        $input['thursday_times'] = rtrim($thursday_times,',');
        $input['friday_times'] = rtrim($friday_times,',');
        $input['saturday_times'] = rtrim($saturday_times,',');
        $input['accepted_insurance'] = $request->accepted_insurance;

       

        $schedule->update($input);
        return redirect()->back()->with('success', 'Schedule Updated Successfully.');
        }

        public function profile()
    {
        return view('doctor.profile');
    }
    public function profileupdate(Request $request)
    {
        $input = $request->all();  
        
        $admin = Auth::guard('doctor')->user();        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                          
            $input['photo'] = $name;
            } 

        $admin->update($input);
        
        return redirect()->route('doctor-profile-info')->with('success','Successfully Updated The Information.');;
    }
}
