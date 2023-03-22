<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\Appointment;

class AdminController extends Controller
{
    
    public function viewdoctors()
    {
        return view('admin.viewdoctors');
    }

 
    public function showdoctors()
    {
        $data = doctor::all();
        return view('admin.showdoctors', compact('data'));
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
        return redirect()->back()->with('message', 'Doctor updated successfuly');
    }

    public function deletedoctor($id)
    {
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function viewappointment()
    {
        $appointment = appointment::all();
        return view('admin.appointment', compact("appointment"));
    }


    public function approve($id)
    {
        $appointment = appointment::find($id);
        $appointment->status = 'Approved';
        $appointment->save();
        return redirect()->back();
    }

    public function cancel($id)
    {
        $appointment = appointment::find($id);
        $appointment->status = 'Canceled';
        $appointment->save();
        return redirect()->back();
    }

    public function email($id)
    {
        return view('admin.email');
    }
}