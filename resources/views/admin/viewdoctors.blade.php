
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
       
    
        <div>
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
    </div>
    @include('admin.adminscript')
  </body>
</html>











