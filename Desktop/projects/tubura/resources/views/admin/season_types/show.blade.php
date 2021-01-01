@extends('layouts.master')



@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Season Type create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Season Type</li>
    </ol>
</nav>

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Season Type Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$seasonType->name}}">
        </div>
                                                                <div class="form-group">
            <label class="col-form-label" for="value">Start</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$seasonType->start}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">End</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$seasonType->end}}">
        </div>
                    </div>

    </div>

    <div class="card mb-4">

                        <div class="card-header">
        <h2>Seasons</h2>
        </div>
        <div class="card-body">
            <div>
                <a href="{{route('seasons.create')}}">New</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                                                                                                                                                                                                                                                                                            </tr>
                </thead>
                <tbody>
                    @foreach($seasonType->seasons as $season)
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
                                                                                                                                                                                                                                                                                            </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
                
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection