@extends('layouts.master')


@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Home</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Complite profile</a></li>
        <!--<li class="breadcrumb-item active" aria-current="page">All Found documents</li>-->
    </ol>
</nav>


@endsection



@section('content')


   
    
 @if (session('success'))
 @include('admin.partials.sucess_alert')     

 @endif


 <div style="border-left:5px solid green" class="alert alert-warning">
    <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i> Please complite your profile before you use the web app.</center>
</div>

<form action="{{route('complite_profile.complite')}}" method="POST" novalidate>
    @csrf   

    <div class="form-group row">
 
        <label class="col-sm-12 col-md-2 col-form-label" for="name">Name</label>
        <div class="col-sm-12 col-md-10">
          <input  class="form-control  @error('name') is-invalid @enderror  String"  type="text"  name="name" id="name" value="{{old('name')}}" maxlength="255"  required="required">
          @if($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
        @endif
    </div>
   </div>


   <div class="form-group row">
 
    <label class="col-sm-12 col-md-2 col-form-label" for="surname">Surname</label>
    <div class="col-sm-12 col-md-10">
      <input  class="form-control  @error('surname') is-invalid @enderror  String"  type="text"  name="surname" id="surname" value="{{old('surname')}}" maxlength="255"  required="required">
      @if($errors->has('surname'))
    <p class="text-danger">{{$errors->first('surname')}}</p>
    @endif
</div>
</div>

<div class="form-group row">
 
    <label class="col-sm-12 col-md-2 col-form-label" for="phone">Phone number</label>
    <div class="col-sm-12 col-md-10">
      <input  class="form-control  @error('phone_number') is-invalid @enderror  String"  type="text"  name="phone_number" id="phone_number" value="{{old('phone_number')}}" maxlength="255"  required="required">
      @if($errors->has('phone_number'))
    <p class="text-danger">{{$errors->first('phone_number')}}</p>
    @endif
</div>
</div>


    
  



    <div class="form-group row">
 
        <label class="col-sm-12 col-md-2 col-form-label" for="email">Cell</label>
            <div class="col-sm-12 col-md-10">

                <select class="js-example-basic-single form-control" style="width:100%" name="cell" id="cell">
                    @foreach($cells as $cell)
                    <option value="{{$cell->id}}">
                        {{$cell->name}}
                    </option>
                    @endforeach
                </select>


               
                @if( $errors->has('cell'))
                  <p class="text-danger">{{$errors->first('cell')}}</p>
                  @endif
            </div>
    </div>
            
    
    <div class="form-group row">
 
        <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
            <div class="col-sm-12 col-md-10">
                <input  class="form-control  @error('email') is-invalid @enderror  String"  type="text" value="{{Auth::user()->email}}"  name="email" id="email" value="{{old('email')}}" maxlength="255"  readonly>
                    @if($errors->has('email'))
                  <p class="text-danger">{{$errors->first('email')}}</p>
                  @endif
              </div>
    </div>


    <div class="form-group row">
 
        <label class="col-sm-12 col-md-2 col-form-label" for="password">Password</label>
            <div class="col-sm-12 col-md-10">
                <input  class="form-control  @error('password') is-invalid @enderror  String"  type="password"  name="password" id="password" value="{{old('password')}}" maxlength="255"  >
                    @if($errors->has('password'))
                  <p class="text-danger">{{$errors->first('password')}}</p>
                  @endif
              </div>
    </div>


    <div class="form-group row">
 
        <label class="col-sm-12 col-md-2 col-form-label" for="password-confirm">Confirm Password</label>
            <div class="col-sm-12 col-md-10">
                <input  class="form-control  String"  type="password"  name="password_confirmation" id="password-confirm" required autocomplete="new-password" >
                   
              </div>
    </div>
                  
                
                                                                               
 
 
       
 
  <div class="offset-6">
                <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Complite</button>   
  </div>
</form>

@endsection
