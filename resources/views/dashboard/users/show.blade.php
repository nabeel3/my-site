@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
           
          </div>
          
        </div>
@if($user)


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
          	<td>{{$user->id}}</td>
          	<td>{{$user->name}}</td>
          	<td>{{$user->created_at}}</td>
          	<td>{{$user->updated_at}}</td>
          	<td></td>
          	<td>
          		<a href="{{route('users.show',$user->id)}}">Show</a>
          		<a href="{{route('users.destroy',$user->id)}}">Delet</a>
          		<a href="{{route('users.edit',$user->id)}}">Edit</a>
          	</td>

          	
          </tr>
      
          <tbody>
           
          </tbody>
        </table>
      </div>
  @else 
  <p class="alert alert-info">No users Record Found</p>    
  @endif
@endsection