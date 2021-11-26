<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = "appointments";

    protected $fillable = ['doctorid', 'patient_id','patient_name', 'patient_last_name', 'patient_email', 'patient_phone', 'patient_visit', 'patient_insurance','insurance_plan', 'visit_for', 'comments', 'appointment_date', 'appointment_time', 'created_at', 'updated_at', 'status'];

}
