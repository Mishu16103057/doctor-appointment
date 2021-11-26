<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appoints = Appointment::whereDate('created_at', '=', date('Y-m-d'))->orderBy('appointment_time','desc')->get();
        return view('admin.category.index',compact('appoints'));
    }

    public function appointments_today()
    {
        $appoints = Appointment::whereDate('appointment_date', '=', date('Y-m-d'))->orderBy('id','desc')->get();
        return view('admin.appointments.today',compact('appoints'));
    }

    public function appointments_pending()
    {
        $appoints = Appointment::where('status', '=', 1)->orderBy('id','desc')->get();
        return view('admin.appointments.pending',compact('appoints'));
    }

    public function appointments_history()
    {
        $appoints = Appointment::where('status', '=', 2)->orderBy('id','desc')->get();
        return view('admin.appointments.history',compact('appoints'));
    }

    public function appointment_done($id){
        $appoints = Appointment::findOrFail($id);
        $data['status'] = 2;
        $appoints->update($data);
        return redirect()->back()->with('success','Appointment Marked as done successfully.');
    }

    public function appointment_remove($id){
        $appoints = Appointment::findOrFail($id);
        $appoints->delete();
        return redirect()->back()->with('success','Appointment Removed successfully.');
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
                    <td colspan='2'>Purpose Of Visit</td>
                </tr>
                <tr>
                    <td colspan='2'>".$appointment->comments."</td>
                </tr>
                ";
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
