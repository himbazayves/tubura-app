@extends('layouts.master')
@section('menu')
@include('admin.partials.menu')
@endsection
@section('path')
<div class="title">
   <h4>New Fertilizer Stock</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Fertilizer Stock</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('fertilizer-stocks.store')}}" method="POST" novalidate>
   @csrf
  
                          <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="season_id">Season</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="season_id" id="season_id">
                     @foreach((\App\Models\Season::all() ?? [] ) as $season)
                     <option value="{{$season->id}}">
                         {{$season->year->name}}- {{$season->season_type->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                                                    <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="fertilizer_id">Fertilizer</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="fertilizer_id" id="fertilizer_id">
                     @foreach((\App\Models\Fertilizer::all() ?? [] ) as $fertilizer)
                     <option value="{{$fertilizer->id}}">
                         {{$fertilizer->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                          


                                                                                           <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="initial_amount">Initial Amount</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('initial_amount') is-invalid @enderror  Integer"  type="number"  name="initial_amount" id="initial_amount" value="{{old('initial_amount')}}"                                   required="required"
                                  >
                                  @if($errors->has('initial_amount'))
                 <p class="text-danger">{{$errors->first('initial_amount')}}</p>
                 @endif
             </div>
            </div>
                            
                                                                                                        


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection