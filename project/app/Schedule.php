<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "schedules";
    protected $fillable = ['doctorid', 'monday_start', 'accepted_insurance', 'tuesday_start', 'wednesday_start', 'thursday_start', 'friday_start', 'saturday_start', 'sunday_start', 'monday_end', 'tuesday_end', 'wednesday_end', 'thursday_end', 'friday_end', 'saturday_end', 'sunday_end', 'sunday_times', 'monday_times', 'tuesday_times', 'wednesday_times', 'thursday_times', 'friday_times', 'saturday_times', 'created_at', 'updated_at', 'status'];

    public static function GetSchedule($date,$docid){
        $day = strtolower(date('l',strtotime($date)));
        $data = $day."_times";
        $sch = "";
        if (Schedule::where('doctorid',$docid)->count() > 0){
            $schedule = Schedule::where('doctorid',$docid)->first();

            foreach(explode(',',$schedule->$data) as $apptime){
                if (Appointment::where('doctorid',$docid)->where('appointment_date',$date)->where('appointment_time',$apptime)->count() == 0){
                    $sch.= "<a href='".url('schedule/appointment/'.$date."/".$apptime)."'>".$apptime."</a><br>";
                }
            }
            return $sch;
        }
        return "N/A";
    }

    public static function GetOpeningHours($day){
        $day_start = $day."_start";
        $day_end = $day."_end";
        $sch = "";
        if (Schedule::where('doctorid',1)->count() > 0){
            $schedule = Schedule::where('doctorid',1)->first();
            return $schedule->$day_start.'-'.$schedule->$day_end;
        }
        return "N/A";
    }

    public static function ScheduleData($docid){
        return Schedule::where('doctorid',$docid)->first();
    }
}
