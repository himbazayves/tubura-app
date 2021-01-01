@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Season Type</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Season Types</a></li>
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

<form method="post" action="{{route('season-types.update',['season_type'=>$season_type->id])}}" >
    @csrf
    @method('PUT')


            

                    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="name">Name</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="name" id="name" value="{{old('name',$season_type->name)}}"
                        required="required"
                >
            @if($errors->has('name'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('name')}}</strong></span>
        @endif
    </div>
</div>
                                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="start">Start</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="start" id="start" value="{{old('start',$season_type->start)}}"
                        required="required"
                >
            @if($errors->has('start'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('start')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="end">End</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="end" id="end" value="{{old('end',$season_type->end)}}"
                        required="required"
                >
            @if($errors->has('end'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('end')}}</strong></span>
        @endif
    </div>
</div>
        
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












