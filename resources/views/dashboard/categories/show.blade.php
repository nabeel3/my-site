@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
           
          </div>
          
        </div>
@if($category)


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>gories
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Users </th>
              <th>Action</th>
            </tr>
          </thead>
      
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td> <img src="{{asset('images/'.$category->thumbnail)}}"> </td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            <td>@foreach($category->children as children)
             {{$children->title}}
             @endforeache
             @else
             {{'Parent Category'}}
             @endif</td>
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
    
          <tbody>
           
          </tbody>
        </table>
      </div>
  @else 
  <p class="alert alert-info">No categories Record Found</p>    
  @endif
@endsection