@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('roles.store')}}">
	@csrf
 <div class="row">	
 	<div class="col-md-8">
     <div class="form-group">
      <label for="inputRoleName">Add New Roles</label>
       <input type="text" class="form-control" name="name" id="inputRoleName" placeholder="Enter Role">
     </div>
    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection