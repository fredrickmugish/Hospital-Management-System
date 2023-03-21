<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
            
   <div style="position: relative; top:60px; right:-20px">
    <table bgcolor="black">
        <tr>
            <th style="padding: 20px">Customer Name</th>
            <th style="padding: 20px">Email</th>
            <th style="padding: 20px">Date</th>
            <th style="padding: 20px">Phone</th>
            <th style="padding: 20px">Doctor Name</th>
            <th style="padding: 20px">Message</th>
            <th style="padding: 20px">Status</th>
            
        </tr>

        @foreach ($appointment as $appointment)
        <tr align="center">
            <td>{{ $appointment->name }}</td>
            <td>{{ $appointment->email }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->phone }}</td>
            <td>{{ $appointment->doctor }}</td>
            <td>{{ $appointment->message }}</td>
            <td>{{ $appointment->status }}</td>
            
        </tr>
        @endforeach
        
    </table>
   </div>
   
   
    </div>
    @include('admin.adminscript')
  </body>
</html>