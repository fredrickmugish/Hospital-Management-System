<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;

use App\Models\Appointment;

class HomeController extends Controller
{
    
public function index()

{
if(Auth::id())
{
  return redirect('redirects');
}

else{
    $data = doctor::all();
    return view('home', compact('data'));
}

    }

public function redirects()
{
    $data = doctor::all();
    $usertype = Auth::user()->usertype;

    if($usertype == '1')
    {
    return view('admin.adminhome');
    }

    else
    {
     return view('home', compact('data'));
    }
}

   public function appointment(Request $request)
  {
    $appointment = new appointment;
    $appointment->name = $request->name;
    $appointment->email = $request->email;
    $appointment->date = $request->date;
    $appointment->phone = $request->phone;
    $appointment->doctor = $request->doctor;
    $appointment->message = $request->message;
    $appointment->status = 'In progress';

    if(Auth::id())
    {
    $appointment->user_id = Auth::user()->id;
    }

    $appointment->save();
    return redirect()->back();

  }

  public function myappointment()
  {
    if(Auth::id())
    {

    //an instance for the user_id of the logged in user $userid
    $userid = Auth::user()->id;

    //an instance to get the details of the loggedin user
    //using the user_id instance from the appointment table
    $appoint = appointment::where('user_id', $userid)->get();
    return view('myappointment', compact('appoint'));
    }

    else
    {
      return redirect()->back();
    }
  }

  public function deleteappoint($id)

  {
    $appoint = appointment::find($id);
    $appoint->delete();
    return redirect()->back();
  }

}
