
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
    <base href="/public">
   @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
            
      <div style="position: relative; top:60px; right:-200px">
<!--doctor uploaded successfuly message--->

@if (session()->has('message'))
    <div class="alert alert-success">
      
        <button type="button" class="close" data-dismiss="alert"></button>
        {{ session()->get('message') }}

    </div>
@endif

    <h1>Send email</h1>

       <form action="{{ url('/sendemail', $appointment->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding: 10px">
                <label>Greeting</label>
                <input style="color:blue" type="text" name="greeting" required>
            </div>
    
            <div style="padding: 10px">
                <label>Body</label>
                <input style="color:blue" type="text" name="body" required>
            </div>
    
            <div style="padding: 10px">
                <label>Action Text</label>
                <input style="color:blue" type="text" name="actiontext"  required>
            </div>
    
            <div style="padding: 10px">
                <label>Action Url</label>
                <input style="color:blue" type="text" name="actionurl" >
            </div>

            <div style="padding: 10px">
                <label>Endpart</label>
                <input style="color:blue"  type="text" name="endpart" required>
            </div>
    
           <div style="padding: 10px">
                <input class="btn btn-success" type="submit" value="send" required>
            </div>
    
        </form>
       
      </div>
    </div>
    @include('admin.adminscript')
  </body>
</html>











