@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
           
          </div>
          
        </div>
@if(!$users->isEmpty())


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
          @foreach ($users as $user)
          <tr>
          	<td>{{$user->id}}</td>
          	<td>{{$user->name}}</td>
              <td>
                  @foreach ($user->roles as $role)
                             {{$role->name}}
                  @endforeach</td>



          	<td>{{$user->created_at}}</td>
          	<td>{{$user->updated_at}}</td>
          	<td></td>
          	<td>
          		<div class="btn-group" user="group" aria-label="Basic example">
				  <a href="{{route('users.show',$user->id)}}" type="button" class="btn btn-link">Show</a>
				  <form method="post" action="{{route('users.destroy',$user->id)}}">
				  	@method('DELETE')
				  	@csrf
				    <button type="submit" class="btn btn-link">Delete</button>
				  </form>
				  <a href="{{route('users.edit',$user->id)}}" type="button" class="btn btn-link">Edit</a>
				</div>
          		
          	</td>

          	
          </tr>
          @endforeach
          <tbody>
           
          </tbody>
        </table>
      </div>
  @else 
  <p class="alert alert-info">No Roles Record Found</p>    
  @endif
@endsection