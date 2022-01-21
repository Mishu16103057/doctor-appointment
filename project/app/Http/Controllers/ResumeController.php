<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class ResumeController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $ads = Resume::all();
        return view('admin.resume.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.resume.create');
    }


    public function store(StoreValidationRequest $request)
    {
        $ad = new Resume();
        $ad->fill($request->all())->save();
        return redirect()->route('admin-rs-index')->with('success','New Resume Added Successfully.');
    }


    public function edit($id)
    {
        $ad = Resume::findOrFail($id);
        return view('admin.resume.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = Resume::findOrFail($id);
        $ad->update($request->all());
        return redirect()->route('admin-rs-index')->with('success','Resume Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = Resume::findOrFail($id);
        $ad->delete();
        return redirect()->route('admin-rs-index')->with('success','Resume Deleted Successfully.');
	}
}
