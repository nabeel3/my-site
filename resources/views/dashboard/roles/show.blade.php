@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('roles.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
           
          </div>
          
        </div>
@if($role)


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Users	</th>
              <th>Action</th>
            </tr>
          </thead>
          
          <tr>
          	<td>{{$role->id}}</td>
          	<td>{{$role->name}}</td>
          	<td>{{$role->created_at}}</td>
          	<td>{{$role->updated_at}}</td>
          	<td></td>
          	<td>
          		<a href="{{route('roles.show',$role->id)}}">Show</a>
          		<a href="{{route('roles.destroy',$role->id)}}">Delet</a>
          		<a href="{{route('roles.edit',$role->id)}}">Edit</a>
          	</td>

          	
          </tr>
      
          <tbody>
           
          </tbody>
        </table>
      </div>
  @else 
  <p class="alert alert-info">No Roles Record Found</p>    
  @endif
@endsection