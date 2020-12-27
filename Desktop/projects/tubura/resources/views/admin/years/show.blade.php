@extends('layouts.master')



@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Year show</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('years.index')}}" >Years</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$year->name}}</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h4> Year Show </h4>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name:</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$year->name}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

                        <div class="card-header">
        <h4>Seasons</h4>
        </div>
        <div class="card-body">
            <div>
                <a href="{{route('seasons.create')}}">New</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                                                                                                                        <th> Start</th>
                                                                                                                                                                                                <th> End</th>
                                                                                                                                                                    </tr>
                </thead>
                <tbody>
                    @foreach($year->seasons as $season)
                    <tr>
                        <td>
                        <a href="{{route('seasons.show',['season'=>$season] )}}">Show</a>
                        <a href="{{route('seasons.edit',['season'=>$season] )}}">Edit</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-season-{{$season->id}}').submit();">
                            Delete
                        </a>
                        <form id="delete-season-{{$season->id}}" action="{{route('seasons.destroy',['season'=>$season])}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </td>
                                                                                                                        <td> {{ $season->start}}</td>
                                                                                                                                                                                                <td> {{ $season->end}}</td>
                                                                                                                                                                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
                
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection