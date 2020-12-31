@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
	@csrf
 <div class="row">	
 	<div class="col-md-8">
     <div class="form-group">
      <label for="inputCategoryName">Add New Category</label>
       <input type="text" class="form-control" name="title" id="inputRoleName" placeholder="Enter Category Title">
     </div>
     <div class="form-group">
      <label for="inputCategoryContent">Content</label>
      <textarea name="content" class="form-control" id="inputCategoryContent"></textarea>
      
     </div>
     <div class="form-group">
      <label for="inputCategoryThubmbail">Add Thumbnail</label>
       <input type="file" class="form-control" name="thumbnail" id="inputCategoryThubmbail" >
     </div>
     <div class="form-group">
      <select name="parent_id" class="browser-default custom-select">
      <option selected>Select Parent Category</option>
       @if(!$categories->isEmpty())
       @foreach($categories as $category)
       <option value="{{$category->id}}">{{$category->title}}</option>
       @endforeach
       @endif
  
</select>
     
       
     </div>
   
    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Add New</button>
</form>




@endsection