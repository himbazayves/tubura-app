@extends('layouts.master')
@section('menu')
@include('admin.partials.menu')
@endsection
@section('path')
<div class="title">
   <h4>New User</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New User</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('users.store')}}" method="POST" novalidate>
   @csrf
  
                                                    <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="current_team_id">Current Team</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="current_team_id" id="current_team_id">
                     @foreach((\App\Models\Team::all() ?? [] ) as $currentTeam)
                     <option value="{{$currentTeam->id}}">
                         {{$currentTeam->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                                                                              


                                                                 <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="name">Name</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('name') is-invalid @enderror  String"  type="text"  name="name" id="name" value="{{old('name')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('name'))
                 <p class="text-danger">{{$errors->first('name')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="surname">Surname</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('surname') is-invalid @enderror  String"  type="text"  name="surname" id="surname" value="{{old('surname')}}"                  maxlength="255"
                                                   >
                                  @if($errors->has('surname'))
                 <p class="text-danger">{{$errors->first('surname')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="phone_number">Phone Number</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('phone_number') is-invalid @enderror  String"  type="text"  name="phone_number" id="phone_number" value="{{old('phone_number')}}"                  maxlength="255"
                                                   >
                                  @if($errors->has('phone_number'))
                 <p class="text-danger">{{$errors->first('phone_number')}}</p>
                 @endif
             </div>
            </div>
                                                                              <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="is_admin">Is Admin</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('is_admin') is-invalid @enderror  Boolean"  type="text"  name="is_admin" id="is_admin" value="{{old('is_admin')}}"                                   required="required"
                                  >
                                  @if($errors->has('is_admin'))
                 <p class="text-danger">{{$errors->first('is_admin')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('email') is-invalid @enderror  String"  type="text"  name="email" id="email" value="{{old('email')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('email'))
                 <p class="text-danger">{{$errors->first('email')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="email_verified_at">Email Verified At</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('email_verified_at') is-invalid @enderror  DateTime"  type="text"  name="email_verified_at" id="email_verified_at" value="{{old('email_verified_at')}}"                                   >
                                  @if($errors->has('email_verified_at'))
                 <p class="text-danger">{{$errors->first('email_verified_at')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="password">Password</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('password') is-invalid @enderror  String"  type="text"  name="password" id="password" value="{{old('password')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('password'))
                 <p class="text-danger">{{$errors->first('password')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="two_factor_secret">Two Factor Secret</label>
                 <div class="col-sm-12 col-md-10">
                                  <textarea class="form-control" name="two_factor_secret" id="two_factor_secret" cols="30" rows="10">{{old('two_factor_secret')}}</textarea>
                                  @if($errors->has('two_factor_secret'))
                 <p class="text-danger">{{$errors->first('two_factor_secret')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="two_factor_recovery_codes">Two Factor Recovery Codes</label>
                 <div class="col-sm-12 col-md-10">
                                  <textarea class="form-control" name="two_factor_recovery_codes" id="two_factor_recovery_codes" cols="30" rows="10">{{old('two_factor_recovery_codes')}}</textarea>
                                  @if($errors->has('two_factor_recovery_codes'))
                 <p class="text-danger">{{$errors->first('two_factor_recovery_codes')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="remember_token">Remember Token</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('remember_token') is-invalid @enderror  String"  type="text"  name="remember_token" id="remember_token" value="{{old('remember_token')}}"                  maxlength="100"
                                                   >
                                  @if($errors->has('remember_token'))
                 <p class="text-danger">{{$errors->first('remember_token')}}</p>
                 @endif
             </div>
            </div>
                                                                              <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="profile_photo_path">Profile Photo Path</label>
                 <div class="col-sm-12 col-md-10">
                                  <textarea class="form-control" name="profile_photo_path" id="profile_photo_path" cols="30" rows="10">{{old('profile_photo_path')}}</textarea>
                                  @if($errors->has('profile_photo_path'))
                 <p class="text-danger">{{$errors->first('profile_photo_path')}}</p>
                 @endif
             </div>
            </div>
                                                                              


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection