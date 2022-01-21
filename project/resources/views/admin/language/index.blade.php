@extends('layouts.admin')

@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Contact Page Content -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Website Languages</h2>
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" action="{{route('admin-lang-submit')}}" method="POST">
                                        @include('includes.form-success')
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Home Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="home" placeholder="Home" value="{{$data->home}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View More Button Text*<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="lm" placeholder="Learn More Text" value="{{$data->lm}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Services Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="home2" placeholder="My Services Text" value="{{$data->home2}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Image Gallery Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="fht" placeholder="Image Gallery Text" value="{{$data->fht}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Happy Customers Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="hcs" placeholder="Happy Customers Text" value="{{$data->hcs}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Latest Blogs Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="lns" placeholder="Latest Blogs Text" value="{{$data->lns}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Profile Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="home1" placeholder="My Profile Text" value="{{$data->home1}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Profile Description Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="dopd" placeholder="Profile Description Text" value="{{$data->dopd}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Info *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="doci" placeholder="Your Language" value="{{$data->doci}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Email Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="doeml" placeholder="Your Language" value="{{$data->doeml}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Full Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="fname" placeholder="Your Language" value="{{$data->fname}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Age *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="age" placeholder="Your Language" value="{{$data->age}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Appointment *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="appointment" placeholder="Your Language" value="{{$data->appointment}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Pending Appointments *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="p_appointments" placeholder="Your Language" value="{{$data->p_appointments}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Appointment History *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="h_appointments" placeholder="Your Language" value="{{$data->h_appointments}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No Appointments*<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="no_appointments" placeholder="Your Language" value="{{$data->no_appointments}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Health Information *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="my_info" placeholder="Your Language" value="{{$data->my_info}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Profile *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="edit" placeholder="Your Language" value="{{$data->edit}}">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Please fill up following informations *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="please_fillup" placeholder="Your Language" value="{{$data->please_fillup}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Who is the consultation for? *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="consultation_for" placeholder="Your Language" value="{{$data->consultation_for}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Is this your first visit? *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="first_visit" placeholder="Your Language" value="{{$data->first_visit}}">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Yes *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="yes" placeholder="Your Language" value="{{$data->yes}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="no" placeholder="Your Language" value="{{$data->no}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Select Your Health Plan *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="select_plan" placeholder="Your Language" value="{{$data->select_plan}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">With or Without Insurance? *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="withorwithout" placeholder="Your Language" value="{{$data->withorwithout}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">For Me *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="for_me" placeholder="Your Language" value="{{$data->for_me}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">For Another Person *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="for_another" placeholder="Your Language" value="{{$data->for_another}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Patient Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="patient_name" placeholder="Your Language" value="{{$data->patient_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Patient Last name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="patient_lastname" placeholder="Your Language" value="{{$data->patient_lastname}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Patient Email *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="patient_email" placeholder="Your Language" value="{{$data->patient_email}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Patient Phone *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="patient_phone" placeholder="Your Language" value="{{$data->patient_phone}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Purpose of visit/Comments *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="purpose_of_visit" placeholder="Your Language" value="{{$data->purpose_of_visit}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">You will make an appointment for *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="you_will" placeholder="Your Language" value="{{$data->you_will}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reservation of Consultation *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="reservation" placeholder="Your Language" value="{{$data->reservation}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Confirmation of Reservation *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="confirmation" placeholder="Your Language" value="{{$data->confirmation}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Your appointment confirmed successfully *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="successfull" placeholder="Your Language" value="{{$data->successfull}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Appointment Confirmed ! *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="confirmed" placeholder="Your Language" value="{{$data->confirmed}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Choose Appointment Date & Time Slot *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="chose_datetime" placeholder="Your Language" value="{{$data->chose_datetime}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Available Times For Date *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="available_times" placeholder="Your Language" value="{{$data->available_times}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Time slots are in 24hrs format. *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="h_format" placeholder="Your Language" value="{{$data->h_format}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Please Select a Date & Time! *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="select_datetime" placeholder="Your Language" value="{{$data->select_datetime}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">CONTINUE *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="continue_btn" placeholder="Your Language" value="{{$data->continue_btn}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Home Page Schedule Section Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="schedule_title" placeholder="Your Language" value="{{$data->schedule_title}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Home Page Schedule Section Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="schedule_text" placeholder="Your Language" value="{{$data->schedule_text}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Book an Appointment *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="_appointment" placeholder="Your Language" value="{{$data->_appointment}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Share Profile *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="dosp" placeholder="Share Profile " value="{{$data->dosp}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Practice Areas Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="cn" placeholder="Practice Areas Text" value="{{$data->cn}}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Others Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="doo" placeholder="Others Text" value="{{$data->doo}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Resume Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="al" placeholder="My Resume Text" value="{{$data->al}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Language Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="dol" placeholder="Language Text" value="{{$data->dol}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Gender Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="doa" placeholder="Gender Text" value="{{$data->doa}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Residency Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="dor" placeholder="Residency Text" value="{{$data->dor}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">About Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="about" placeholder="About Text" value="{{$data->about}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="blog" placeholder="blog Text" value="{{$data->blog}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="vt" placeholder="Blog Title *" value="{{$data->vt}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Details Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="gt" placeholder="Blog Details Text" value="{{$data->gt}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Source Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="bs" placeholder="Blog Source Text" value="{{$data->bs}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Recent Posts Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="ss" placeholder="Blog Recent Posts Text" value="{{$data->ss}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Details Button Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="vd" placeholder="View Details Text" value="{{$data->vd}}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="faq" placeholder="Faq Text" value="{{$data->faq}}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Title Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="vdn" placeholder="Faq Title Text " value="{{$data->vdn}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="contact" placeholder="Contact Text" value="{{$data->contact}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Title Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="doc" placeholder="Contact Title Text" value="{{$data->doc}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Name Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="con" placeholder="Contact Name Text" value="{{$data->con}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Phone Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="cop" placeholder="Contact Phone Text" value="{{$data->cop}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Email Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="coe" placeholder="Contact Email Text" value="{{$data->coe}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Reply Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="cor" placeholder="Contact Replay Text" value="{{$data->cor}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Button Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="sm" placeholder="Contact Button Text" value="{{$data->sm}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="ston" placeholder="Subscribe Text" value="{{$data->ston}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Button Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="s" placeholder="Subscribe Button Text" value="{{$data->s}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Placeholder Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="supl" placeholder="Subscribe Placeholder Text" value="{{$data->supl}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Footer Links Text*<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input id="contact_form_success_text" class="form-control" type="text" name="fl" placeholder="Footer Links Text" value="{{$data->fl}}" required="">
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Language Setting</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard FAQ Page -->
                </div>
            </div>
        </div>
    </div>
@endsection