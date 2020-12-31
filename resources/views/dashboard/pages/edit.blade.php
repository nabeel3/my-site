@extends('dashboard.layout')
@section('content')
<form method="Post" action="{{route('roles.update',$role->id)}}">
	@method('PUT')
	@csrf
 <div class="row">	
 	<div class="col-md-8">
     <div class="form-group">
      <label for="inputRoleName">Edit Role</label>
       <input type="text" class="form-control" name="name" id="inputRoleName" placeholder="Enter Role" value="{{$role->name}}">
      <!--  <input type="hidden" name="_method" value="PUT"> -->
     <!--  <input type="hidden" value="{{$role->id}}" name="id"> -->
     </div>
    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Update</button>
</form>




@endsection