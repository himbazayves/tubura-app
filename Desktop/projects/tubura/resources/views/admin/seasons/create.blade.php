@extends('layouts.master')
@section('menu')
@include('admin.partials.menu')
@endsection
@section('path')
<div class="title">
   <h4>New Season</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Season</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('seasons.store')}}" method="POST" novalidate>
   @csrf
  
                          <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="season_type_id">Season Type</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="season_type_id" id="season_type_id">
                     @foreach((\App\Models\SeasonType::all() ?? [] ) as $season_type)
                     <option value="{{$season_type->id}}">
                         {{$season_type->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                                                    <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="year_id">Year</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="year_id" id="year_id">
                     @foreach((\App\Models\Year::all() ?? [] ) as $year)
                     <option value="{{$year->id}}">
                         {{$year->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                          


                                                                 <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="start">Start</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('start') is-invalid @enderror  String"  type="date"  name="start" id="start" value="{{old('start')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('start'))
                 <p class="text-danger">{{$errors->first('start')}}</p>
                 @endif
             </div>
            </div>
                                                                                                        <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="end">End</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('end') is-invalid @enderror  String"  type="date"  name="end" id="end" value="{{old('end')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('end'))
                 <p class="text-danger">{{$errors->first('end')}}</p>
                 @endif
             </div>
            </div>
                                                                              


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection