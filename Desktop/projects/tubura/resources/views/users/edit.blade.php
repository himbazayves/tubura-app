@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>User</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">id</li>
    </ol>
</nav>


@endsection



@section('content')


@if($errors->any())
<div class="alert alert-light border-left danger">
<ul>
    @foreach($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

<form method="post" action="{{route('users.update',['user'=>$user->id])}}" >
    @csrf
    @method('PUT')


                

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="current_team_id">Current Team</label>
        <div class="col-sm-12 col-md-10">
        <select class="js-example-basic-single form-control" style="width:100%" name="current_team_id" id="current_team_id">
            @foreach((\App\Models\Team::all() ?? [] ) as $currentTeam)
            <option value="{{$currentTeam->id}}"
                @if($user->current_team_id == old('current_team_id', $currentTeam->id))
                selected="selected"
                @endif
            >{{$currentTeam->name}}</option>

            @endforeach
        </select>
    </div>
</div>
                        

                    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="name">Name</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="name" id="name" value="{{old('name',$user->name)}}"
                        required="required"
                >
            @if($errors->has('name'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('name')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="surname">Surname</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="surname" id="surname" value="{{old('surname',$user->surname)}}"
                        >
            @if($errors->has('surname'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('surname')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="phone_number">Phone Number</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="phone_number" id="phone_number" value="{{old('phone_number',$user->phone_number)}}"
                        >
            @if($errors->has('phone_number'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('phone_number')}}</strong></span>
        @endif
    </div>
</div>
                        <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="is_admin">Is Admin</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control Boolean"  type="text"  name="is_admin" id="is_admin" value="{{old('is_admin',$user->is_admin)}}"
                        required="required"
                >
            @if($errors->has('is_admin'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('is_admin')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="email" id="email" value="{{old('email',$user->email)}}"
                        required="required"
                >
            @if($errors->has('email'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('email')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="email_verified_at">Email Verified At</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control DateTime"  type="text"  name="email_verified_at" id="email_verified_at" value="{{old('email_verified_at',$user->email_verified_at)}}"
                        >
            @if($errors->has('email_verified_at'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('email_verified_at')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="password">Password</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="password" id="password" value="{{old('password',$user->password)}}"
                        required="required"
                >
            @if($errors->has('password'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('password')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="two_factor_secret">Two Factor Secret</label>
        <div class="col-sm-12 col-md-10">
                <textarea class="form-control Text"  name="two_factor_secret" id="two_factor_secret" cols="30" rows="10">{{old('two_factor_secret',$user->two_factor_secret)}}</textarea>
            @if($errors->has('two_factor_secret'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('two_factor_secret')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="two_factor_recovery_codes">Two Factor Recovery Codes</label>
        <div class="col-sm-12 col-md-10">
                <textarea class="form-control Text"  name="two_factor_recovery_codes" id="two_factor_recovery_codes" cols="30" rows="10">{{old('two_factor_recovery_codes',$user->two_factor_recovery_codes)}}</textarea>
            @if($errors->has('two_factor_recovery_codes'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('two_factor_recovery_codes')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="remember_token">Remember Token</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="remember_token" id="remember_token" value="{{old('remember_token',$user->remember_token)}}"
                        >
            @if($errors->has('remember_token'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('remember_token')}}</strong></span>
        @endif
    </div>
</div>
                        <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="profile_photo_path">Profile Photo Path</label>
        <div class="col-sm-12 col-md-10">
                <textarea class="form-control Text"  name="profile_photo_path" id="profile_photo_path" cols="30" rows="10">{{old('profile_photo_path',$user->profile_photo_path)}}</textarea>
            @if($errors->has('profile_photo_path'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('profile_photo_path')}}</strong></span>
        @endif
    </div>
</div>
                        
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












