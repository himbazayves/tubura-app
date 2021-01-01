@extends('layouts.master')
@section('menu')
@include('admin.partials.menu')
@endsection
@section('path')
<div class="title">
   <h4>New Seed Request</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Seed Request</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('seed-requests.store')}}" method="POST" novalidate>
   @csrf
  
                          <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="season_id">Season</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="season_id" id="season_id">
                     @foreach((\App\Models\Season::all() ?? [] ) as $season)
                     <option value="{{$season->id}}">
                         {{$season->year->name}}-{{$season->season_type->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                                                    <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="farmer_id">Farmer</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="farmer_id" id="farmer_id">
                     @foreach((\App\Models\Farmer::all() ?? [] ) as $farmer)
                     <option value="{{$farmer->id}}">
                         {{$farmer->name}} {{$farmer->surname}}({{$farmer->NID}}) </option>
                     @endforeach
                 </select>
             </div>
            </div>
                                                    <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="seed_id">Seed</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="seed_id" id="seed_id">
                     @foreach((\App\Models\Seed::all() ?? [] ) as $seed)
                     <option value="{{$seed->id}}">
                         {{$seed->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                          


                                                                                                                                               <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="requested_amount">Requested Amount</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('requested_amount') is-invalid @enderror  String"  type="text"  name="requested_amount" id="requested_amount" value="{{old('requested_amount')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('requested_amount'))
                 <p class="text-danger">{{$errors->first('requested_amount')}}</p>
                 @endif
             </div>
            </div>
                  
                                                   
                                                                              


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection