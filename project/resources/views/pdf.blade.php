<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Apointment Schedule</h2>
    <table>
    <tr>
                    <td>Appointment Date</td>
                    <td>{{$appointment->appointment_date}}</td>
                </tr>
                <tr>
                    <td>Appointment Time</td>
                    <td>{{$appointment->appointment_time}}</td>
                </tr>
                <tr>
                    <td>Appointment For</td>
                    <td>{{$appointment->visit_for}}</td>
                </tr>
                <tr>
                    <td>Patient First Name</td>
                    <td>{{$appointment->patient_name}}</td>
                </tr>
                <tr>
                    <td>Patient Last Name</td>
                    <td>{{$appointment->patient_last_name}}</td>
                </tr>
                <tr>
                    <td>Patient Phone</td>
                    <td>{{$appointment->patient_phone}}</td>
                </tr>
                <tr>
                    <td>Patient Email</td>
                    <td>{{$appointment->patient_email}}</td>
                </tr>
                <tr>
                    <td>Patient Insurance</td>
                    <td>{{$appointment->patient_insurance}}</td>
                </tr>
                <tr>
                    <td>Insurance Plan</td>
                    <td>{{($appointment->insurance_plan != "" ? $appointment->insurance_plan:"None")}}</td>
                </tr>
                <tr>
                    <td>Patient First Visit</td>
                    <td>{{$appointment->patient_visit}}</td>
                </tr>
                <tr>
                    <td>Appointment Booking Date</td>
                    <td>{{$appointment->created_at}}</td>
                </tr>
                <tr>
                    <td colspan='2'>Comments</td>
                </tr>
                <tr>
                    <td colspan='2'>{{$appointment->comments}}</td>
                </tr>
                "
    </table>
</body>
</html>