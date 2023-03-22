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


        <div>
            <h1 align="center">Doctors</h1>
            <table bgcolor="black">
                <tr>
                    <th style="padding: 30px" >Name</th>
                    <th style="padding: 30px">phone</th>
                    <th style="padding: 30px">Speciality</th>
                    <th style="padding: 30px">Room</th>
                    <th style="padding: 30px">Image</th>
                    <th style="padding: 30px">Action</th>
                    <th style="padding: 30px">Action</th>
                </tr>
    
                @foreach ($data as $data)
                <tr align="center">
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->speciality }}</td>
                    <td>{{ $data->room }}</td>
                    <td><img height="100" width="100" src="/doctorimage/{{ $data->image }}"></td>
                    <td><a href="{{ url('/updateview', $data->id) }}" class="btn btn-primary">Update</a></td>
                    <td><a href="{{ url('/deletedoctor', $data->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
       
      
    </div>
    @include('admin.adminscript')
  </body>
</html>