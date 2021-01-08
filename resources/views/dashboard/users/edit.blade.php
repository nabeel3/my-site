@extends('dashboard.layout')
@section('content')
<form method="Post" action="{{route('users.update',$user->id)}}">
	@method('PUT')
	@csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="inputRoleName">edit Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}" id="inputRoleName" placeholder="Enter user Name">
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">


                <label for="inputRoleName">User Role</label>
                @if(!$roles->isEmpty())
                    @foreach($roles as $role)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  name="roles[]"  @if(in_array($role->id, $user->roles->pluck('id')->toArray())) {{"checked"}}@endif value="{{$role->id}}">
                    <label class="form-check-label" for="inlineCheckbox1"> {{$role->name}}</label>
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