@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('categories.update',$category->id)}}">

  @method('PUT')
  @csrf
 <div class="row">  
  <div class="col-md-8">
     <div class="form-group">
      <label for="inputCategoryName">Edit Category</label>
       <input type="text" class="form-control" name="name" id="inputRoleName" placeholder="Enter Category Title" value="{{$category->title}}">
     </div>
     <div class="form-group">
      <label for="inputCategoryContent">Content</label>
      <textarea name="content" class="form-control" id="inputCategoryContent">{{$category->title}}</textarea>
      
     </div>
     
     <div class="form-group">
      <img src="{{asset('images/blog/'.$category->thumbnail)}}" class="img-fluid img thumbnail" width="100" height="100"
      >
      <label for="inputCategoryThubmbail">Add Thumbnail</label>
       <input type="file" class="form-control" name="thumbnail" id="inputCategoryThubmbail" >
     </div>
     <div class="form-group">
      <label for="inputCategoryParent">Select Parent</label>
       <select name="parent_id" class="browser-default custom-select">
   
       @if(!$categories->isEmpty())
       @foreach($categories as $category)
       <option value="{{$category->id}}">{{$category->title}}</option>
       @endforeach
       @endif
  
</select>
     </div>
   
    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Update</button>
</form>




@endsection