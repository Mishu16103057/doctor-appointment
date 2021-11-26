<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialist;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;


class SpecialistController extends Controller
{
public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $ads = Specialist::all();
        return view('admin.special.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.special.create');
    }


    public function store(StoreValidationRequest $request)
    {
		$this->validate($request, [
		       'photo' => 'required',
		   ]);
        $ad = new Specialist();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $ad->fill($data)->save();
        return redirect()->route('admin-sp-index')->with('success','New Content Added Successfully.');
    }


    public function edit($id)
    {
        $ad = Specialist::findOrFail($id);
        return view('admin.special.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = Specialist::findOrFail($id);
        $data = $request->all();

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->photo != null)
                {
                    unlink(public_path().'/assets/images/'.$ad->photo);
                }            
            $data['photo'] = $name;
            } 
            else
            {
            	$data['photo'] = $ad->photo;
            }
        $ad->update($data);
        return redirect()->route('admin-sp-index')->with('success','Content Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = Specialist::findOrFail($id);
        unlink(public_path().'/assets/images/'.$ad->photo);
        $ad->delete();
        return redirect()->route('admin-sp-index')->with('success','Content Deleted Successfully.');
    }
}
