@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
           
          </div>
          
        </div>
@if(!$posts->isEmpty())


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
          @foreach ($posts as $post)
          <tr>
          	<td>{{$post->id}}</td>
          	<td>{{$post->title}}</td>
          	<td>{{$post->created_at}}</td>
          	<td>{{$post->updated_at}}</td>
          	<td></td>
          	<td>
          		<div class="btn-group" role="group" aria-label="Basic example">
				  <a href="{{route('roles.show',$post->id)}}" type="button" class="btn btn-link">Show</a>
				  <form method="post" action="{{route('posts.destroy',$post->id)}}">
				  	@method('DELETE')
				  	@csrf
				    <button type="submit" class="btn btn-link">Delete</button>
				  </form>
				  <a href="{{route('roles.edit',$post->id)}}" type="button" class="btn btn-link">Edit</a>
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