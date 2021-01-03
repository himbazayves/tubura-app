@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Application</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Seed Applications</a></li>
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

<form method="post" action="{{route('seed-applications.update',['seed_application'=>$seed_application->id])}}" >
    @csrf
    @method('PUT')


           <input type="hidden" name="id" value="{{$seed_application->id}}"> 

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
   <div class="form-group row">
   <label class="col-sm-12 col-md-2 col-form-label" for="status">Status</label>
   <div class="col-sm-12 col-md-10">

    <select class="form-control" name="open" id="">
        @if($seed_application->open)
         <option value="1" selected>Open</option>
         <option value="0">Closed</option>

         @else
         <option value="0" selected>Closed</option>
         <option value="1">Open</option>
        @endif
    </select>

  
                  
    @if($errors->has('initial_amount'))
   <p class="text-danger">{{$errors->first('initial_amount')}}</p>
   @endif
</div>
</div>
                        
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












