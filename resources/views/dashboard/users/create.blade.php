@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('users.store')}}">
	@csrf
 <div class="row">	
 	<div class="col-md-8">
     <div class="form-group">
      <label for="inputRoleName">Add Name</label>
       <input type="text" class="form-control" name="name" id="inputRoleName" placeholder="Enter Role">
     </div>
     <div class="form-group">
      <label for="inputRoleName">Email</label>
       <input type="Email" class="form-control" name="email" id="inputRoleEmail" placeholder="Enter Email">
     </div>

     <div class="form-group">
      <label for="inputRoleName">Password</label>
       <input type="Password" class="form-control" name="password" id="inputRoleName" placeholder="Enter Role">
     </div>
       <div class="form-group">


      <label for="inputRoleName">User Role</label>
       @if(!$roles->isEmpty())
       @foreach($roles as $role)
       <input type="checkbox" name="roles[]"  value="{{ $role->id }}"  /> {{ $role->name }}<br>
								
       
       @endforeach
       @endif
  
    
 </div>
     
       
     
     <div class="form-group">
      <label for="inputRoleName">Contact</label>
       <input type="text" class="form-control" name="contact" id="inputRoleName" placeholder="Enter Role">
     </div>
    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection