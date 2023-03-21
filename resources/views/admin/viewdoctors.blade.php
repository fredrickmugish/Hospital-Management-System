
<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

<style type="text/css">
label{
    display: inline-block;
    width: 100px;
}
</style>
    
   @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
            
      <div style="position: relative; top:60px; right:-50px">
<!--doctor uploaded successfuly message--->

@if (session()->has('message'))
    <div class="alert alert-success">
      
        <button type="button" class="close" data-dismiss="alert"></button>
        {{ session()->get('message') }}

    </div>
@endif

    <h1>Add doctors</h1>

       <form action="{{ url('/uploaddoctor') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding: 10px">
                <label>Doctor's Name</label>
                <input style="color:blue" type="text" name="name" placeholder="Enter doctor's name" required>
            </div>
    
            <div style="padding: 10px">
                <label>Phone</label>
                <input style="color:blue" type="number" name="phone" placeholder="Enter phone number" required>
            </div>
    
            <div style="padding: 10px">
                <label>Speciality</label>
                <input style="color:blue" type="text" name="speciality" placeholder="Enter doctor's speciality" required>
            </div>
    
            <div style="padding: 10px">
                <label>Room number</label>
                <input style="color:blue"  type="text" name="room" placeholder="Enter room number" required>
            </div>
    
            <div style="padding: 10px">
                <label>Image</label>
                <input type="file" name="image" required>
            </div>
    
           <div style="padding: 10px">
                <input class="btn btn-success" type="submit" value="save" required>
            </div>
    
        </form>
       
      </div>
    </div>
    @include('admin.adminscript')
  </body>
</html>











