<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreValidationRequest;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $deps = Department::all();
        return view('admin.department.index',compact('deps'))->with('no', 1);;
    }

    public function create()
    {
        return view('admin.department.create');
    }
    public function store(StoreValidationRequest $request)
    {
       
		$this->validate($request, [
		       'photo' => 'required',
		   ]);
        $ad = new Department();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $ad->fill($data)->save();
        return redirect()->route('admin-department-index')->with('success','New Department Added Successfully.');
    }
    public function destroy($id)
    {
        $ad = Department::findOrFail($id);
        unlink(public_path().'/assets/images/'.$ad->photo);
        $ad->delete();
        return redirect()->route('admin-department-index')->with('success','Department Deleted Successfully.');
    }
}
