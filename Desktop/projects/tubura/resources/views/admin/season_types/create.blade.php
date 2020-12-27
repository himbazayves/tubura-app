@extends('layouts.master')
@section('menu')
@include('admin.partials.menu')
@endsection
@section('path')
<div class="title">
   <h4>New Season Type</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Season Type</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('season-types.store')}}" method="POST" novalidate>
   @csrf
  
                          


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
                                                                              


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection