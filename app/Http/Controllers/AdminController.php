<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

class AdminController extends Controller
{
    
    public function viewdoctors()
    {
        $data = doctor::all();
        return view('admin.viewdoctors', compact('data'));
    }

    public function uploaddoctor(Request $request)
    {
         $data = new doctor;
         $data->name = $request->name;
         $data->phone = $request->phone;
         $data->speciality = $request->speciality;
         $data->room = $request->room;

         $image = $request->image;
         $imagename = time().'.'.$image->getClientOriginalExtension();
         $request->image->move('doctorimage', $imagename);
         $data->image = $imagename;

         $data->save();
         return redirect()->back()->with('message', 'Doctor uploaded successfuly');
    }

    public function updateview($id)
    {
        $data = doctor::find($id);
        return view('admin.updatedoctor', compact('data'));
        return redirect()->back();
    }

    public function updatedoctor(Request $request, $id)
    {
        
        $data = doctor::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->speciality = $request->speciality;
        $data->room = $request->room;

        $image = $request->image;

        if($image)
        {
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('doctorimage', $imagename);
        $data->image = $imagename;
         }

        $data->save();
        return redirect()->back();
    }

    public function deletedoctor($id)
    {
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
}