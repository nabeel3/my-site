@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
	@csrf
 <div class="row">	
 	<div class="col-md-8">

        <div class="form-group">
            <label for="inputRoleName">Add New Title</label>
            <input type="text" class="form-control" name="title" id="inputRoleName" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="inputRoleName">Add New Content</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="inputRoleName">Add New thumbnail</label>
            <input type="file" class="form-control" name="thumbnail" id="inputRoleName" placeholder="chose file">
        </div>



        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection