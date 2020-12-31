@extends('dashboard.layout')
@section('content')
<h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('roles.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
           
          </div>
          
        </div>
@if(!$roles->isEmpty())


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              <th>Users	</th>
            </tr>
          </thead>
          <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td></td>

          	
          </tr>
          <tbody>
           
          </tbody>
        </table>
      </div>
  @else 
  <p class="alert alert-info">No Roles Record Found</p>    
  @endif
@endsection