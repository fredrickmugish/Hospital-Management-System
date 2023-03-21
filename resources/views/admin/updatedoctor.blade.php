<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

<style>
  label{
    display: inline;
    width: 100px;
  }
</style>


    <base href="/public">
   @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
            
   
      <div style="position: relative; top:60px; right:-100px">
<!--doctor updated successfuly message-->
@if (session()->has('message'))
  <div class="alert alert-success">
{{ session()->get('message') }}
  </div>
@endif
        <form action="{{ url('/updatedoctor', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Doctor's Name</label>
                <input style="color:blue" type="text" name="name" value="{{ $data->name }}" required>
            </div>
    
            <div>
                <label>Phone</label>
                <input style="color:blue" type="number" name="phone" value="{{ $data->phone }}" required>
            </div>
    
            <div>
              <label>Speciality</label>
              <input style="color:blue"  type="text" name="speciality" value="{{ $data->speciality }}" required>
          </div>
    
            <div>
                <label>Room number</label>
                <input style="color:blue"  type="text" name="room" value="{{ $data->room }}" required>
            </div>
    
            <div>
                <label>Old Image</label>
                <img height="100" width="100" src="/doctorimage/{{ $data->image }}">
            </div>
    
         <div>
            <label>New Image</label>
            <input type="file" name="image" >
         </div>

           <div>
                <input class="btn btn-success" type="submit" value="update" required>
            </div>
    
        </form>
      </div>
   
    </div>
    @include('admin.adminscript')
  </body>
</html>
