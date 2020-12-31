@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Category</a>
           
          </div>
          
        </div>
@if(!$categories->isEmpty())


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>thumbnail</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Users	</th>
              <th>Action</th>
            </tr>
          </thead>
          @foreach ($categories as $category)
          <tr>
          	<td>{{$category->id}}</td>
          	<td>{{$category->title}}</td>

            <td> <img src="{{asset('images/blog/'.$category->thumbnail)}}" width="100" height="100" > </td>
          	<td>{{$category->created_at}}</td>
          	<td>{{$category->updated_at}}</td>
           <!--  <td>{{$category->children}}</td> -->
            
          	<td>

            @if(!$category->children->isEmpty())

             @foreach($category->children as $children)
             {{$children->title}},
             @endforeach
             @else
             {{'Parent Category'}}
             @endif
            </td>
       
          	<td>
          		<div class="btn-group" category="group" aria-label="Basic example">
				  <a href="{{route('categories.show',$category->id)}}" type="button" class="btn btn-link">Show</a>
				  <form method="post" action="{{route('categories.destroy',$category->id)}}">
				  	@method('DELETE')
				  	@csrf
				    <button type="submit" class="btn btn-link">Delete</button>
				  </form>
				  <a href="{{route('categories.edit',$category->id)}}" type="button" class="btn btn-link">Edit</a>
				</div>
          		
          	</td>

          	
          </tr>
          @endforeach
          <tbody>
           
          </tbody>
        </table>
      </div>
  @else 
  <p class="alert alert-info">No categories Record Found</p>    
  @endif
@endsection