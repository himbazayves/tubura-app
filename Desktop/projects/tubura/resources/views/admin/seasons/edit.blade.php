@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Season</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Seasons</a></li>
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

<form method="post" action="{{route('seasons.update',['season'=>$season->id])}}" >
    @csrf
    @method('PUT')


        

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="season_type_id">Season Type</label>
        <div class="col-sm-12 col-md-10">
        <select class="js-example-basic-single form-control" style="width:100%" name="season_type_id" id="season_type_id">
            @foreach((\App\Models\SeasonType::all() ?? [] ) as $season_type)
            <option value="{{$season_type->id}}"
                @if($season->season_type_id == old('season_type_id', $season_type->id))
                selected="selected"
                @endif
            >{{$season_type->name}}</option>

            @endforeach
        </select>
    </div>
</div>
            

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="year_id">Year</label>
        <div class="col-sm-12 col-md-10">
        <select class="js-example-basic-single form-control" style="width:100%" name="year_id" id="year_id">
            @foreach((\App\Models\Year::all() ?? [] ) as $year)
            <option value="{{$year->id}}"
                @if($season->year_id == old('year_id', $year->id))
                selected="selected"
                @endif
            >{{$year->name}}</option>

            @endforeach
        </select>
    </div>
</div>
        

                                            
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












