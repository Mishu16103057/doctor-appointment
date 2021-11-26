<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class ServiceController extends Controller
{
 public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $ads = Service::all();
        return view('admin.service.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.service.create');
    }


    public function store(StoreValidationRequest $request)
    {
		$this->validate($request, [
		       'photo' => 'required',
		   ]);
        $ad = new Service();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $ad->fill($data)->save();
        return redirect()->route('admin-sr-index')->with('success','New Service Added Successfully.');
    }


    public function edit($id)
    {
        $ad = Service::findOrFail($id);
        return view('admin.service.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = Service::findOrFail($id);
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
        return redirect()->route('admin-sr-index')->with('success','Service Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = Service::findOrFail($id);
        unlink(public_path().'/assets/images/'.$ad->photo);
        $ad->delete();
        return redirect()->route('admin-sr-index')->with('success','Service Deleted Successfully.');
    }
}
