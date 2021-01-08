@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('users.store')}}">
	@csrf
 <div class="row">	
 	<div class="col-md-8">
     <div class="form-group">
      <label for="inputRoleName">Add Name</label>
       <input type="text" class="form-control" name="name" id="inputRoleName" placeholder="Enter user Name">
     </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
       <div class="form-group">


      <label for="inputRoleName">User Role</label>
           @if(!$roles->isEmpty())
               @foreach($roles as $role)
           <div class="form-check form-check-inline">
               <input class="form-check-input" name="roles[]" type="checkbox" id="inlineCheckbox1" value="{{$role->id}}">
               <label class="form-check-label" for="inlineCheckbox1">{{$role->name}} </label>
           </div>
               @endforeach
           @endif

       


  
    
 </div>
     
       
     
     <div class="form-group">
      <label for="inputRoleName">Contact</label>
       <input type="text" class="form-control" name="contact" id="inputRoleName" placeholder="Enter user contact no">
     </div>
    </div>
   </div> 
      <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection