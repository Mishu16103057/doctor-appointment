<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class ImageController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');
    }

  	public function index()
    {
        $ads = Image::all();
        return view('admin.images.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.images.create');
    }


    public function store(StoreValidationRequest $request)
    {
		$this->validate($request, [
		       'photo' => 'required',
		   ]);
        $ad = new Image();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $ad->fill($data)->save();
        return redirect()->route('admin-img-index')->with('success','New Image Added Successfully.');
    }


    public function edit($id)
    {
        $ad = Image::findOrFail($id);
        return view('admin.images.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = Image::findOrFail($id);
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
        return redirect()->route('admin-img-index')->with('success','Image Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = Image::findOrFail($id);
        unlink(public_path().'/assets/images/'.$ad->photo);
        $ad->delete();
        return redirect()->route('admin-img-index')->with('success','Image Deleted Successfully.');
    }
}
