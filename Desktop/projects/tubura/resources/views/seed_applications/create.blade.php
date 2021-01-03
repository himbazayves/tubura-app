@extends('layouts.master')
@section('menu')
@include('admin.partials.menu')
@endsection
@section('path')
<div class="title">
   <h4>New Seed Application</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Seed Application</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('seed-applications.store')}}" method="POST" novalidate>
   @csrf
  
                          


               

           <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="seed_application_id">Season</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="season_id" id="season_id">
                     @foreach((\App\Models\Season::all() ?? [] ) as $season)
                     <option value="{{$season->id}}">
                         {{$season->year->name}}-{{$season->season_type->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>     
                                                                              


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection